<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Sequence;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\RoleRightService;

class SequenceController extends Controller
{
	public function __construct(
		RoleRightService $roleRightService
	) {
		$this->roleRightService = $roleRightService;
	}
	public function index()
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Sequences Control");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

		// if(!\Auth::user()->can_open_sequence) return redirect('/');

		$sequencess = Sequence::orderBy('created_at', 'DESC')->limit(50)->get();
		//$sequences = $sequences->paginate(10);

		// $sequences = Sequence::all();

		$perPage = 10;

		$currentPage = LengthAwarePaginator::resolveCurrentPage();

		if ($currentPage == 1) {
			$start = 0;
		} else {
			$start = ($currentPage - 1) * $perPage;
		}

		$currentPageCollection = $sequencess->slice($start, $perPage)->all();

		$sequences = new LengthAwarePaginator($currentPageCollection, count($sequencess), $perPage);

		$sequences->setPath(LengthAwarePaginator::resolveCurrentPath());

		return view('pages.sequence.index', compact(
			'sequences',
			'create',
			'edit',
			'delete'
		));
	}

	public function create()
	{
	}

	public function storefabnum(Request $request)
	{

		Sequence::create($request->all());

		return back();
	}

	public function updatefabnum(Request $request)
	{

		Sequence::find($request->id)->update($request->all());

		return back();
	}

	public function getAction(Request $request)
	{

		if ($request->action == 'Open') {

			$seq = Sequence::find($request->id);
			$seq->is_open = 1;
			$seq->is_manual = 1;
			$seq->save();

			return 'Close';
		}

		$seq = Sequence::find($request->id);
		$seq->is_open = 0;
		$seq->is_manual = 0;
		$seq->save();

		return 'Open';
	}

	public function closeOpenSequence()
	{

		$time = \Carbon\Carbon::now();


		$latest_sequences = Sequence::where('is_fabricated', 0)->latest()->take(2)->get();

		$this->generateSequence();
		$this->closeIsNotManualSequence();
		//Log::info($latest_sequences);

		// madelete na ang session
		if ($time->hour == 12 && $time->minute > 1 && $time->minute < 20) {
			$this->deleteSessionData();
			Auth::logout();
		}

		if ($time->hour < 12) {

			$latest_sequences[0]->is_open = 0;
			$latest_sequences[0]->is_manual = 0;
			$latest_sequences[0]->save();

			$latest_sequences[1]->is_open = 1;
			$latest_sequences[1]->is_manual = 0;
			$latest_sequences[1]->save();
		} else {

			$latest_sequences[0]->is_open = 1;
			$latest_sequences[0]->is_manual = 0;
			$latest_sequences[0]->save();

			if (!$latest_sequences[1]->is_manual) {
				$latest_sequences[1]->is_open = 0;
				$latest_sequences[1]->is_manual = 0;
				$latest_sequences[1]->save();
			}

			if ($time->hour == 18) {

				if ($is_eten = Sequence::where('is_fabricated', 1)
					->latest()->first()
				) {
					$is_eten->is_open = 0;
					$is_eten->save();
				}
			}
		}

		return 'yey';
	}

	public function closeIsNotManualSequence()
	{

		$is_open = Sequence::where('is_open', 1)
			->where('is_manual', 0)
			->where('is_fabricated', 0)
			->latest()->get();

		foreach ($is_open as $open) {
			\Log::info($open->created_at->diffInDays(\Carbon\Carbon::now()));
			if ($open->created_at->diffInDays(\Carbon\Carbon::now()) != 0) {
				$open->is_open = 0;
				$open->save();
			}
		}
	}

	public function generateSequence()
	{

		$last_sequence = Sequence::where('is_fabricated', 0)->latest('sequence_id')->first();
		$time = \Carbon\Carbon::now();

		if (
			!$last_sequence ||
			\Carbon\Carbon::parse($last_sequence->date_created)->day != \Carbon\Carbon::now()->day
		) {
			$next_sequence = $last_sequence ? $last_sequence->sequence_id : 1234;

			$last_sequence->is_open = 0;
			$last_sequence->is_manual = 0;
			$last_sequence->save();

			for ($x = 0; $x < 2; $x++) {
				$seq = new \App\Sequence;
				$seq->sequence_id = ++$next_sequence;
				if ($x == 0) {
					if ($time->hour < 12) {
						$seq->is_open = 1;
						$seq->is_manual = 0;
					} else {
						$seq->is_open = 0;
						$seq->is_manual = 0;
					}
				} else {
					if ($time->hour < 12) {
						$seq->is_open = 0;
						$seq->is_manual = 0;
					} else {
						$seq->is_open = 1;
						$seq->is_manual = 0;
					}
				}
				$seq->date_created = $x == 0 ? \Carbon\Carbon::create($time->year, $time->month, $time->day, 0, 0, 1) :
					\Carbon\Carbon::create($time->year, $time->month, $time->day, 12, 0, 1);
				$seq->save();
			}
		}
	}


	public function deleteSessionData()
	{

		// change to table session || $sessions = Session::all()->truncate();
		$sessions = glob(storage_path("framework/sessions/*"));

		foreach ($sessions as $file) {
			if (is_file($file) && file_exists($file)) {
				\Log::info(unlink($file));
			}
		}
	}
}
