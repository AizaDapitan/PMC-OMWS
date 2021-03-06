<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Contractor;
use App\Location;
use App\Item;
use App\Receiver;
use App\Approver;
use App\IRMSTransaction;
use App\IRMSTransactionDetail;
use App\Transaction;
use App\TransactionDetail;
use App\Costcode;
use App\Sequence;
use App\Services\RoleRightService;

class TransactionController extends Controller
{
	public function __construct(
		RoleRightService $roleRightService
	) {
		$this->roleRightService = $roleRightService;
	}

	public function irmsTransactions(Request $request)
	{

		$rolesPermissions = $this->roleRightService->hasPermissions("PPE Issuance Request");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

		$transactions = IRMSTransaction::where('isContractor', 1)
			->where(function ($query) use ($request) {
				if ($request->has('searchtxt') && $request->searchtxt != '') {
					$query->where('receiver', 'like', '%' . $request->searchtxt . '%')
						->orWhere('receiverId', 'like', '%' . $request->searchtxt . '%')
						->orWhere('controlNum', 'like', '%' . $request->searchtxt . '%');
				}
				if ($request->has('location') && $request->location != '') {
					$query->where('location', $request->location);
				}
			})
			->orderBy('id', 'DESC')
			->paginate(20);


		return view('pages.transactions.ppe', compact(
			'transactions',
			'create',
			'edit',
			'delete'
		));
	}

	public function transactions(Request $request)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Transactions");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];
		$print = $rolesPermissions['print'];


		$rel = ['location', 'item', 'contractor'];

		if ($request->has('print')) {

			$transaction = Transaction::find($request->transId);
			return view('pages.transactions.transaction-print', compact('transaction'));
		}

		$transactions = Transaction::whereIn('status', ['SAVED', 'POSTED', 'CANCELLED'])
			->select('transactions.*', 'c.fname as cFname', 'c.lname as cLname', 'c.mname as cMname', 'l.name as locName')
			->leftjoin('locations as l', 'transactions.location_id', '=', 'l.id')
			->leftjoin('contractors as c', 'transactions.contractor_id', '=', 'c.id')
			->where(function ($query) use ($request, $rel) {
				if (!is_null($request->search_type) && !in_array($request->search_type, $rel)) {
					$query->where($request->search_type, 'like', '%' . $request->search_txt . '%');
				} elseif (!is_null($request->search_type) && $request->search_type == 'contractor') {
					$query->where('c.fname', 'like', '%' . $request->search_txt . '%')
						->orWhere('c.lname', 'like', '%' . $request->search_txt . '%')
						->orWhere('c.mname', 'like', '%' . $request->search_txt . '%');
				} elseif (!is_null($request->search_type) && $request->search_type == 'location') {
					$query->where('l.name', 'like', '%' . $request->search_txt . '%');
				} elseif (!is_null($request->search_type) && $request->search_type == 'item') {
					$query->whereHas('details', function ($q1) use ($request) {
						$q1->whereHas('itemz', function ($q2) use ($request) {
							$q2->where('code', 'like', '%' . $request->search_txt . '%')
								->orWhere('name', 'like', '%' . $request->search_txt . '%');
						});
					});
				} elseif (!is_null($request->search_type) && $request->search_type == 'costcode') {
					$query->whereHas('details', function ($q1) use ($request) {
						$q1->where('cost_code', 'like', '%' . $request->search_txt . '%');
					});
				}
			})
			->orderBy('transactions.id', 'DESC')
			->paginate(20);

		return view('pages.transactions.transactions', compact(
			'transactions',
			'create',
			'edit',
			'delete',
			'print'
		));
	}

	public function editTransaction($id)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Transactions");

		if (!$rolesPermissions['edit']) {
			abort(401);
		}
		$transaction = Transaction::find($id);
		$contractors = Contractor::where('isActive', 1)->orderBy('lname')->get();
		$locations = Contractor::find($transaction->contractor_id)->location()->where('locations.isActive', 1)->orderBy('name')->get();
		$approvers = Approver::where('isActive', 1)->orderBy('name')->get();
		// $costcodes = Costcode::where('isActive', 1)->orderBy('name')->get();
		if ($transaction->locationz) {
			$costcodes = $transaction->locationz->costcode()->where('isActive', 1)->orderBy('name')->get();
		} else {
			$costcodes = Costcode::where('isActive', 1)->where('id', 489)->orderBy('name')->get();
		}
		$costcodes1 = Costcode::where('isActive', 1)->orderBy('name')->get();

		return view('pages.transactions.transaction-edit', compact('transaction', 'contractors', 'locations', 'approvers', 'costcodes', 'costcodes1'));
	}

	public function createIRMSTransaction($id)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("PPE Issuance Request");
		
		if (!$rolesPermissions['create']) {
			abort(401);
		}
		$transaction = IRMSTransaction::find($id);
		$approvers = Approver::where('isActive', 1)->orderBy('name')->get();
		$items = Item::where('category', 'ppe')->get();
		$costcodes = Costcode::where('isActive', 1)->orderBy('name')->get();
		$locations = Contractor::find($transaction->contractorId)->location()->orderBy('name')->get();

		//		$this->generateSequence();

		$open_sequences = Sequence::where('is_open', 1)
			->get();

		return view('pages.transactions.ppe-create', compact('transaction', 'approvers', 'items', 'costcodes', 'locations', 'open_sequences'));
	}

	public function createTransaction()
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Transactions");
		if (!$rolesPermissions['create']) {
			abort(401);
		}
		$locations = Location::where('isActive', 1)->orderBy('name')->get();
		$contractors = Contractor::where('isActive', 1)->orderBy('lname')->get();
		$receivers = Receiver::distinct()->select('name')->where('isActive', 1)->groupBy('name')->orderBy('name')->get();
		$approvers = Approver::distinct()->select('name')->where('isActive', 1)->groupBy('name')->orderBy('name')->get();
		$costcodes = Costcode::where('isActive', 1)->orderBy('name')->get();
		$items = Item::where('isNotActive', 0)->get();

		//		$this->generateSequence();

		$open_sequences = Sequence::where('is_open', 1)->orderBy('is_fabricated', 'asc')
			->get();

		return view('pages.transactions.create', compact('contractors', 'locations', 'items', 'approvers', 'receivers', 'costcodes', 'open_sequences'));
	}

	public function storeIRMSTransaction(Request $request)
	{

		$file = null;
		if (is_null($request->location)) $request['location'] = 0;
		$this->validate($request, [
			'contractor'		=> 'required',
			'docdate'			=> 'required',
			'mws'				=> 'required',
			'receiver'			=> 'required',
			'approver'			=> 'required',
			'issuer'			=> 'required',
			'seq'				=> 'required'
		]);

		if ($request->hasFile('file')) {
			$fileName = $request->file->getClientOriginalName();
			$path = \Storage::disk('public')->putFileAs('images/files', $request->file, $request->trans_id . $fileName);
			$file = \Storage::disk('public')->url($path);
		}

		$transaction_check = Transaction::where('mws', $request->mws)
			->where('seq', $request->seq)
			->where('status', 'SAVED')
			->first();

		if ($transaction_check)
			return back()->with('error_message', "Transaction with an ID of {$request->seq} - {$request->mws} currently have a pending transaction. Please settle the previous transaction first before creating a new transaction");

		$transaction = Transaction::create([
			'contractor_id'		=> $request->contractor_id,
			'location_id'		=> $request->location,
			'docDate'			=> $request->docdate,
			'seq'				=> $request->seq,
			'mws'				=> $request->mws,
			'receiver'			=> $request->receiver,
			'approver'			=> $request->approver,
			'issuer'			=> $request->issuer,
			'remarks'			=> $request->remarks,
			'addedDate'			=> \Carbon\Carbon::now(),
			'addedBy'			=> auth()->user()->name,
			'transId'			=> "{$request->seq} - {$request->mws}",
			'files'				=> $file,
			'status'			=> 'SAVED'
		]);

		$transaction_items = IRMSTransactionDetail::where('headerId', $request->trans_id)->get();

		foreach ($transaction_items as $item) {

			if ($item->qty == $item->qtyReleased) continue;

			$qty = "qty{$item->id}";
			$item_id = "item{$item->id}";
			$cost_code = "ccode{$item->id}";
			$is_deducted = "deduction{$item->id}";

			$trans_details = new TransactionDetail;
			$trans_details->transaction_id 	= $transaction->id;
			$trans_details->qty 			= $request->$qty;
			$trans_details->item_id 		= $request->$item_id;
			$trans_details->cost_code		= $request->$cost_code;
			$trans_details->is_deducted		= $request->has($is_deducted) ? 1 : 0;
			$trans_details->irms_ref 		= $item->id;
			$trans_details->added_by		= auth()->user()->name;
			$trans_details->datetimeadded   = \Carbon\Carbon::now();
			$trans_details->save();
		}

		return redirect()->route('transactions')->with('success', 'PPE Issuance has been added!!');
	}

	public function storeTransaction(Request $request)
	{

		if ($request->is_new_r == 1) {
			$request['receiver'] = $request->receiveri;
			$r = new Receiver;
			$r->name = $request->receiver;
			$r->save();
		}

		$this->validate($request, [
			'contractor'		=> 'required',
			'docdate'			=> 'required',
			'mws'				=> 'required',
			'receiver'			=> 'required',
			'approver'			=> 'required',
			'issuer'			=> 'required',
			'seq'				=> 'required'
		]);

		$new_items = json_decode($request->t1, true);
		$files = null;

		$transaction_check = Transaction::where('mws', $request->mws)
			->where('seq', $request->seq)
			->where('status', 'SAVED')
			->first();

		if ($transaction_check)
			return back()->with('error_message', "Transaction with an ID of {$request->seq} - {$request->mws} currently have a pending transaction. Please settle the previous transaction first before creating a new transaction");

		Transaction::create([
			'contractor_id'		=> $request->contractor,
			'location_id'		=> $request->location,
			'status'			=> 'SAVED',
			'addedDate'			=> \Carbon\Carbon::now(),
			'addedBy'			=> auth()->user()->name,
			'docDate'			=> $request->docdate,
			'files'				=> $files,
			'mws'				=> $request->mws,
			'transId'			=> "{$request->seq} - {$request->mws}",
			'seq'				=> $request->seq,
			'approver'			=> $request->approver,
			'receiver'			=> $request->receiver,
			'issuer'			=> $request->issuer,
			'remarks'			=> $request->remarks
		]);
		$transaction = Transaction::latest()->first();

		if ($request->hasFile('file')) {

			$fileName = $request->file->getClientOriginalName();
			$path = \Storage::disk('public')->putFileAs('images/files', $request->file, $transaction->id . $fileName);
			$files = \Storage::disk('public')->url($path);

			$transaction->files = $files;
			$transaction->save();
		}

		if (count($new_items)) {
			foreach ($new_items as $item) {

				TransactionDetail::create([
					'transaction_id'	=> $transaction->id,
					'qty'				=> $item['qty'],
					'item_id'			=> $item['id'],
					'cost_code'			=> $item['costcode'],
					'is_deducted'		=> $item['is_deducted'],
					'irms_ref'			=> 0,
					'added_by'			=> auth()->user()->name,
					'datetimeadded'		=> \Carbon\Carbon::now()
				]);
			}
		}

		return redirect()->route('transactions')->with('success', 'Transaction has been added!!');
	}

	public function updateTransactionStatus($id, Request $request)
	{

		$transaction = Transaction::find($id);

		if ($request->status == "POSTED") {

			foreach ($transaction->details as $details) {

				$irms_ref = IRMSTransactionDetail::find($details->irms_ref);

				if ($irms_ref) {
					$irms_ref->update(['qtyReleased' => $irms_ref->qty, 'systemref' => $id]);
				}
			}

			$transaction->update(['status' => 'POSTED']);

			return redirect()->route('transactions')->with('success', "Transaction with an ID of {$transaction->transId} has been POSTED!");
		} else if ($request->status == 'CANCELLED') {

			$transaction->update(['status' => 'CANCELLED']);

			return redirect()->route('transactions')->with('success', "Transaction with an ID of {$transaction->transId} has been CANCELLED!");
		} else if ($request->status == 'CLASSIC') {

			$transaction->update([
				'rq'		=> $request->rq,
				'batch'		=> $request->batch
				//'status'	=> "CANCELLED"
			]);

			return redirect()->route('transactions')->with('success', "Transaction with an ID of {$transaction->transId} has been UPDATED!");
		}
	}

	public function updateTransaction($id, Request $request)
	{

		// explode items to be added, deleted and updated
		$existing_items = json_decode($request->t1, true);
		$new_items		= json_decode($request->t2, true);

		if (is_null($request->location)) $request['location'] = 0;

		$this->validate($request, [
			'contractor'		=> 'required',
			'docdate'			=> 'required',
			'mws'				=> 'required',
			'receiver'			=> 'required',
			'approver'			=> 'required',
			'issuer'			=> 'required',
			'seq'				=> 'required',
		]);


		$validator = \Validator::make($new_items, [
			'*.costcode' => 'required',
			'*.qty' => 'required',
		]);

		if ($validator->fails())
			return redirect()->back()->with([
				'error_message', 'Costcode or Qty is missing on new added items!!',
				'new_items' => $new_items
			]);


		$transaction = Transaction::find($id);

		$transaction->update([
			'contractor_id'		=> $request->contractor,
			'location_id'		=> $request->location,
			'docDate'			=> $request->docdate,
			// 'files'				=> $files
			'mws'				=> $request->mws,
			'seq'				=> $request->seq,
			'approver'			=> $request->approver,
			'receiver'			=> $request->receiver,
			'issuer'			=> $request->issuer,
			//'transId'			=> $request->mws ,
			'transId'			=> "{$request->seq} - {$request->mws}",
			'remarks'			=> $request->remarks,
			'editedby'			=> auth()->user()->name,
			'datetimeedited'	=> \Carbon\Carbon::now()
		]);


		if (count($existing_items)) {
			foreach ($existing_items as $trans_detail) {
				$tdetail = TransactionDetail::find($trans_detail['id']);

				if ($trans_detail['is_delete'] == 1) {
					$tdetail->delete();
				} else {

					$tdetail->cost_code 		= $trans_detail['costcode'];
					$tdetail->qty       		= $trans_detail['qty'];
					$tdetail->is_deducted		= $trans_detail['is_deducted'];
					$tdetail->save();
				}
			}
		}

		$tdetail = new TransactionDetail;

		if (count($new_items)) {
			foreach ($new_items as $new_item) {
				$tdetail = new TransactionDetail;
				$tdetail->transaction_id = $transaction->id;
				$tdetail->qty = $new_item['qty'];
				$tdetail->item_id = $new_item['id'];
				$tdetail->cost_code = $new_item['costcode'];
				$tdetail->is_deducted = $new_item['is_deducted'];
				$tdetail->added_by = auth()->user()->name;
				$tdetail->irms_ref = 0;
				$tdetail->datetimeadded = \Carbon\Carbon::now();
				$tdetail->save();
			}
		}

		return redirect()->route('transactions')->with('success', "Transaction with an ID of {$transaction->id} has been updated!");
	}

	public function postTransactionByID(Request $request)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("per Transaction ID");
		
		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];

		$trans_id = 0;

		if (!is_null($request->transaction_id)) {
			$trans_id = explode("-", $request->transaction_id);
			$trans_id = $trans_id[count($trans_id) - 1];
		}

		if (!is_null($request->transaction_id)) {
			$transactions = transaction::where('status', 'SAVED')
				->where('seq', $trans_id)
				->orderBy('id', 'DESC')
				->get();
		} else {
			$transactions = [];
		}

		return view('pages.transactions.post-per-id', compact('transactions','create'));
	}

	public function updateTransactionByID($seq, Request $request)
	{

		$trans_id = 0;

		if ($seq != 0 || !is_null($seq)) {
			$trans_id = explode("-", $seq);
			$trans_id = $trans_id[count($trans_id) - 1];
			$seq = $trans_id;
		} else {
			return redirect()->back();
		}

		$transactions = Transaction::where('status', 'SAVED')
			->where('seq', $seq)
			->get();

		foreach ($transactions as $transaction) {

			foreach ($transaction->details as $detail) {

				$irms_ref = IRMSTransactionDetail::find($detail->irms_ref);

				if ($irms_ref) {
					$irms_ref->update(['qtyReleased' => $irms_ref->qty]);
				}
			}

			$transaction->update(
				[
					'status' => 'POSTED',
					'postedDate' => \Carbon\Carbon::now(),
					'postedBy' => auth()->user()->name
				]
			);
		}

		return redirect()->back()->with('message', "Transactions with an ID of {$seq} has been POSTED");
	}

	public function postTransactionByDate(Request $request)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("per Document Date");
		
		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];

		if (!is_null($request->docdate)) {
			$transactions = Transaction::where('status', 'SAVED')
				->where('docDate', '>=', $request->docdate)
				->get();
		} else {
			$transactions = [];
		}

		return view('pages.transactions.post-per-date', compact('transactions','create'));
	}

	public function updateTransactionByDate($docDate, Request $request)
	{

		$transactions = Transaction::where('status', 'SAVED')
			->where('docDate', '>=', $docDate)
			->get();

		foreach ($transactions as $transaction) {

			foreach ($transaction->details as $detail) {

				$irms_ref = IRMSTransactionDetail::find($detail->irms_ref);

				if ($irms_ref) {
					$irms_ref->update(['qtyReleased' => $irms_ref->qty]);
				}
			}

			$transaction->update(
				[
					'status' => 'POSTED',
					'postedDate' => \Carbon\Carbon::now(),
					'postedBy' => auth()->user()->name
				]
			);
		}

		return redirect()->back()->with('message', "Transactions with an ID of {$seq} has been POSTED");
	}

	public function updateNoPar($id)
	{

		$item = IRMSTransactionDetail::find($id);
		$item->noPAR = 1;
		$item->qtyReleased = $item->qty;
		$item->save();

		return redirect()->back()->with('success', 'Item NO. PAR field is updated!!');
	}



	public function getAllTransaction11()
	{
		$t = Transaction::where('docDate', '<=', 'Sep 25 2016 12:00AM');
		dd($t);

		foreach ($t as $a) {

			$b = \Carbon\Carbon::parse($a->docDate)->format('Y-m-d');
			$c = \Carbon\Carbon::parse($a->postedDate)->format('Y-m-d');
			$d = \Carbon\Carbon::parse($a->addedDate)->format('Y-m-d');
			$a->update([
				'docDate'		=>  $b,
				'postedDate'	=>  $c,
				'addedDate'		=>  $d
			]);
		}

		return $t;
	}
}
