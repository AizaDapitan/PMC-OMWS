<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Receiver;

class ReceiverController extends Controller
{

	public function index(Request $request) {

		if($request->receivername!=null || $request->receivername!='') {

		$receivers = Receiver::where('name','like','%' .$request->receivername. '%')->get();	

		} else {

		$receivers = Receiver::orderBy('name')->get();

		}

		$perPage = 10;

		$currentPage = LengthAwarePaginator::resolveCurrentPage();

		if ($currentPage == 1) {
		    $start = 0;
		}
		else {
		    $start = ($currentPage - 1) * $perPage;
		}

		$currentPageCollection = $receivers->slice($start, $perPage)->all();

		$receivers = new LengthAwarePaginator($currentPageCollection, count($receivers), $perPage);

		$receivers->setPath(LengthAwarePaginator::resolveCurrentPath());

		return view('pages.receivers.index', compact('receivers'));

	}


	public function store(Request $request) {

		$data = $this->validate($request, [
			'lname'			=> 'required' ,
			'fname'			=> 'required' ,
			'mname'			=> ''
 		]);
		
		$name = "{$data['lname']}, {$data['fname']} {$data['mname']}";

		Receiver::create(['name' => strtoupper($name)]);

		return redirect()->route('maintenance.receivers.index')->with('success', 'Receiver has been saved!!');

	}

	public function update($id, Request $request) {

		$receiver = Receiver::find($id);

		$receiver->update($request->except(['_method', '_token']));

		return redirect()->route('maintenance.receivers.index')->with('success', 'Receiver has been updated!!');

	}

	public function rstore(Request $request) {

		$data = $this->validate($request, [
			'lname'			=> 'required' ,
			'fname'			=> 'required' ,
			'mname'			=> ''
 		]);

		
		$name = "{$data['lname']}, {$data['fname']} {$data['mname']}";

		$existing = Receiver::where('name',$name)->first();

		if($existing) {

		return back()->with('duplicate', 'Receiver already existing!!');

		} else {

		Receiver::create(['name' => strtoupper($name)]);

		return back()->with('success', 'Receiver has been saved!!');

		}

	}




}
