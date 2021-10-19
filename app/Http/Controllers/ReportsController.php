<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Location;
use App\Contractor;
use App\Transaction;
use App\TransactionDetail;
use App\Exports\Issuance;
use Excel;
use Maatwebsite\Excel\Concerns\FromView;
use App\Services\ReportService;
use App\Services\UserService;
use \OwenIt\Auditing\Models\Audit;
use App\Services\RoleRightService;

class ReportsController extends Controller
{

	public function __construct(
		RoleRightService $roleRightService,
		ReportService $reportService,
		UserService $userService
	) {
		$this->reportService = $reportService;
		$this->roleRightService = $roleRightService;
		$this->userService = $userService;
	}
	public function all(Request $request)
	{
		ini_set('max_execution_time', '0');
		$locations = Location::where('isActive', 1)->get();
		$contractors = Contractor::where('isActive', 1)->get();

		// $transactions = TransactionDetail::
		// 	whereHas('transaction' ,function($query) use ($request) {

		// 		if( $request->location != '' && $request->contractor != '' ) {
		// 			$query->where('status', 'POSTED')
		// 				->where('location_id', $request->location)
		// 				->where('contractor_id', $request->contractor)
		// 				->where('docDate', '>=', $request->start)
		// 				->where('docDate', '<=', $request->end);
		// 		} else if( $request->location != '' && $request->contractor == '' ) {
		// 			$query->where('status', 'POSTED')
		// 				->where('location_id', $request->location)
		// 				->where('docDate', '>=', $request->start)
		// 				->where('docDate', '<=', $request->end);
		// 		} else if( $request->location == '' && $request->contractor != '') {
		// 			$query->where('status', 'POSTED')
		// 				->where('contractor_id', $request->contractor)
		// 				->where('docDate', '>=', $request->start)
		// 				->where('docDate', '<=', $request->end);
		// 		} else {
		// 			$query->where('status', 'POSTED')
		// 				->where('docDate', '>=', \Carbon\Carbon::now()->subMonth(1));
		// 		}
		// 	})
		// 	->where(function($query) use ($request){
		// 		if( $request->has('ckb') ) {
		// 			$query->where('is_deducted', 1);
		// 		}
		// 	})
		// 	->latest()
		// 	->get();

		$transactions = Transaction::where('status', 'POSTED')
			->where(function ($query) use ($request) {
				if ($request->has('start') && $request->has('end')) {
					$query->where('docDate', '>=', $request->start)
						->where('docDate', '<=', $request->end);
				} else {
					$query->whereDate('docDate', '>=', \Carbon\Carbon::now()->subMonth(1)->format('Y-m-d'));
				}
			})
			->where(function ($query) use ($request) {
				if (!is_null($request->location) && !is_null($request->contractor)) {
					$query->where('location_id', $request->location)
						->where('contractor_id', $request->contractor);
				} else if (!is_null($request->location) && is_null($request->contractor)) {
					$query->where('location_id', $request->location);
				} else if (is_null($request->location) && !is_null($request->contractor)) {
					$query->where('contractor_id', $request->contractor);
				}
			})
			->with(['details' => function ($query) use ($request) {
				if ($request->has('ckb')) {
					$query->where('is_deducted', 1);
				}
			}])
			->get();

		if ($request->has('print') || $request->has('excel')) {

			return view('pages.reports.transactions-export', compact('transactions'));
		}

		$saveLogs = $this->reportService->create("Issuance Report", $request);
		return view('pages.reports.transactions', compact('transactions', 'locations', 'contractors'));
	}


	public function itemIssuance(Request $request)
	{
		ini_set('max_execution_time', '0');
		$locations = Location::where('isActive', 1)->get();
		$contractors = Contractor::where('isActive', 1)->get();

		$transactions = Transaction::where('status', 'POSTED')
			->select('transactions.*', 'c.fname as cFname', 'c.lname as cLname', 'c.mname as cMname', 'l.name as locName')
			->leftjoin('locations as l', 'transactions.location_id', '=', 'l.id')
			->leftjoin('contractors as c', 'transactions.contractor_id', '=', 'c.id')
			->where(function ($query) use ($request) {
				if ($request->has('start') && $request->has('end')) {
					$query->where('transactions.docDate', '>=', $request->start)
						->where('transactions.docDate', '<=', $request->end);
				} else {
					$query->where('transactions.docDate', '>=', \Carbon\Carbon::now()->subMonth(1));
				}
			})
			->where(function ($query) use ($request) {
				if (!is_null($request->location) && !is_null($request->contractor)) {
					$query->where('transactions.location_id', $request->location)
						->where('transactions.contractor_id', $request->contractor);
				} elseif (!is_null($request->location) && is_null($request->contractor)) {
					$query->where('transactions.location_id', $request->location);
				} else if (is_null($request->location) && !is_null($request->contractor)) {
					$query->where('transactions.contractor_id', $request->contractor);
				}
			})
			->with(['details' => function ($query) use ($request) {
				$query->with(['itemz' => function ($query1) use ($request) {
					if (!is_null($request->item)) {
						$query1->where('code', 'like', '%' . $request->item . '%')
							->orWhere('name', 'like', '%' . $request->item . '%');
					}
				}]);
			}])
			->orderBy('docDate', 'DESC')
			->get()->groupBy('contractor_id', 'location_id');


		if ($request->has('print') || $request->has('excel')) {
			return view('pages.reports.item-issuance-export', compact('transactions'));
		}


		$saveLogs = $this->reportService->create("Item Issuance Summary", $request);
		return view('pages.reports.item-issuance', compact('transactions', 'locations', 'contractors'));
	}


	public function itemIssuanceDetails(Request $request)
	{
		ini_set('max_execution_time', '0');
		$locations = Location::where('isActive', 1)->get();
		$contractors = Contractor::where('isActive', 1)->get();

		$transactions = Transaction::where('status', 'POSTED')
			->select('transactions.*', 'c.fname as cFname', 'c.lname as cLname', 'c.mname as cMname', 'l.name as locName')
			->leftjoin('locations as l', 'transactions.location_id', '=', 'l.id')
			->leftjoin('contractors as c', 'transactions.contractor_id', '=', 'c.id')
			->where(function ($query) use ($request) {
				if ($request->has('start') && $request->has('end')) {
					$query->where('transactions.docDate', '>=', $request->start)
						->where('transactions.docDate', '<=', $request->end);
				} else {
					$query->where('transactions.docDate', '>=', \Carbon\Carbon::now()->subMonth(1));
				}
			})
			->where(function ($query) use ($request) {
				if (!is_null($request->location) && !is_null($request->contractor)) {
					$query->where('transactions.location_id', $request->location)
						->where('transactions.contractor_id', $request->contractor);
				} elseif (!is_null($request->location) && is_null($request->contractor)) {
					$query->where('transactions.location_id', $request->location);
				} else if (is_null($request->location) && !is_null($request->contractor)) {
					$query->where('transactions.contractor_id', $request->contractor);
				}
			})
			->with(['details' => function ($query) use ($request) {
				$query->with(['itemz' => function ($query1) use ($request) {
					if (!is_null($request->item)) {
						$query1->where('code', 'like', '%' . $request->item . '%')
							->orWhere('name', 'like', '%' . $request->item . '%');
					}
				}]);
			}])
			->orderBy('docDate', 'DESC')
			->get()->groupBy('contractor_id', 'location_id');


		if ($request->has('print') || $request->has('excel')) {
			return view('pages.reports.item-issuance-details-export', compact('transactions'));
		}

		$saveLogs = $this->reportService->create("Item Issuance Details", $request);
		return view('pages.reports.item-issuance-details', compact('transactions', 'locations', 'contractors'));
	}


	public function locationHistory(Request $request)
	{

		$locs = Location::where('isActive', 1)->get();
		$locations = Location::where('isActive', 1)
			->where(function ($query) use ($request) {
				if (!is_null($request->location)) {
					$query->where('id', $request->location);
				}
			})
			->with(['contractor' => function ($query) use ($request) {
				if ($request->has('start') && $request->has('end')) {
					$query->where('addedDate', '>=', $request->start)
						->where('addedDate', '<=', $request->end)
						->where('contractor_location.isActive', 1);
				} else {
					$query->where('addedDate', '>=', \Carbon\Carbon::now()->subMonths(3))
						->where('contractor_location.isActive', 1);
				}
			}])
			->get();

			$saveLogs = $this->reportService->create("Location History", $request);
		return view('pages.reports.location-history', compact('locations', 'locs'));
	}


	public function contractorHistory(Request $request)
	{
		$conts = Contractor::where('isActive', 1)->get();
		$contractors = Contractor::where('isActive', 1)
			->where(function ($query) use ($request) {
				if (!is_null($request->contractor)) {
					$query->where('id', $request->contractor);
				}
			})
			->with(['location' => function ($query) use ($request) {
				if ($request->has('start') && $request->has('end')) {
					$query->where('addedDate', '>=', $request->start)
						->where('addedDate', '<=', $request->end)
						->where('contractor_location.isActive', 1);
				} else {
					$query->where('addedDate', '>=', \Carbon\Carbon::now()->subMonths(3))
						->where('contractor_location.isActive', 1);
				}
			}])
			->get();

		$saveLogs = $this->reportService->create("Contractor History", $request);
		return view('pages.reports.contractor-history', compact('contractors', 'conts'));
	}



	public function issuanceByStatus(Request $request)
	{
		$transactions = Transaction::where('status', $request->status)
			->where(function ($query) use ($request) {
				if (!is_null($request->start) && !is_null($request->end)) {
					$query->where('docDate', '>=', $request->start)
						->where('docDate', '<=', $request->end);
				}
			})
			->with(['details' => function ($query) {
				$query->with('itemz');
			}, 'contractor', 'locationz'])
			->get();

		if ($request->has('print') || $request->has('excel')) {
			return view('pages.reports.transaction-by-status-export', compact('transactions'));
		}

		$saveLogs = $this->reportService->create("Unposted Transactions", $request);
		return view('pages.reports.transaction-by-status', compact('transactions'));
	}


	public function issuanceByTransactionID(Request $request)
	{
		$trans_id = '0';

		if (!is_null($request->trans_id)) {
			$trans_id = explode("-", $request->trans_id);
			$trans_id = $trans_id[count($trans_id) - 1];
		}

		$transactions = Transaction::where('seq', $trans_id)
			->where(function ($query) use ($request) {
				if ($request->status == 'saved') {
					$query->where('status', 'SAVED');
				} else if ($request->status == 'posted') {
					$query->where('status', 'POSTED');
				} else if ($request->status == 'cancelled') {
					$query->where('status', 'CANCELLED');
				}
			})
			->with(['details' => function ($query) {
				$query->with('itemz');
			}, 'contractor', 'locationz'])
			->get();

		if ($request->has('print') || $request->has('excel'))
			return view('pages.reports.transaction-by-transid-export', compact('transactions'));

		$saveLogs = $this->reportService->create("Summary per Transaction #", $request);
		return view('pages.reports.transaction-by-transid', compact('transactions'));
	}

	public function auditLogs(Request $request)
	{
		// $rolesPermissions = $this->roleRightService->hasPermissions("Audit Logs");
		// if (!$rolesPermissions['view']) {
		//     abort(401);
		// }
		$dateFrom = now()->toDateString();
		$dateTo = now()->toDateString();
		$userid = 0;
		if (isset($request->dateFrom)) {
			$dateFrom = $request->dateFrom;
		}
		if (isset($request->dateTo)) {
			$dateTo = $request->dateTo;
		}
		if (isset($request->userid)) {
			$userid = $request->userid;
		}

		$users =  $this->userService->all()->where('active', 1)->where('username', '<>', '')->sortBy('username');


		$audits = Audit::when(isset($dateTo), function ($q) use ($dateFrom, $dateTo) {
			$q->whereBetween('created_at',  [$dateFrom . ' 00:00:00', $dateTo . ' 23:59:59']);
		})
			->when(!isset($dateTo), function ($q) use ($dateFrom) {
				$q->whereDate('created_at', $dateFrom);
			})
			->when($userid != 0, function ($q) use ($userid) {
				$q->where('user_id', $userid);
			})
			->get();

		$saveLogs = $this->reportService->create("Audit Logs", $request);
		return view('pages.reports.audits', [
			'audits' => $audits,
			'users' => $users
		]);
	}
}
