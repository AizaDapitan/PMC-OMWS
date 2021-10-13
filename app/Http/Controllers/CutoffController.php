<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cutoff;
use App\Transaction;

class CutoffController extends Controller
{


	public function index() {

		$cutoffs = Cutoff::orderBy('id', 'DESC')->paginate(15);

		return view('pages.cutoffs.index', compact('cutoffs'));

	}


	public function store (Request $request) 
	{

		$transactions = Transaction::where('status', 'SAVED')
			->whereDate('docDate', '<=', $request->name)
			->get();
		$trans = count($transactions);

		if( count($transactions) ) 
			return redirect()->back()->with('error_message', "You cant lock {$request->name} as there are still {$trans} Unposted Transaction");

		Cutoff::create([
			'name'			=> $request->name ,
			'addedDate'		=> \Carbon\Carbon::now() ,
			'addedBy'		=> auth()->user()->name 
		]);

		return redirect()->back()->with('success', 'Cutoff has been created!!');

	}
	


}
