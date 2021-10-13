<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Costcode;
use App\Location;

class CostcodeController extends Controller
{


	public function index(Request $request) {

		$costcodes = Costcode::latest()
			->where(function($query) use ($request){
				if($request->has('searchtxt') && $request->searchtxt != '') {
					$query->where('name', 'like', '%'.$request->searchtxt.'%' );
				}
			})
			->paginate(15);

		return view('pages.costcodes.index', compact('costcodes'));

	}


	public function store(Request $request) {

		$data = $this->validate($request, [
			'name'			=> 'required' ,
			'description'	=> ''
		]);

		Costcode::create($data);

		return redirect()->route('maintenance.costcodes.index')->with('success', 'Costcode has been saved!!');

	}


	public function update($id, Request $request) {

		$costcode = Costcode::find($id);

		$costcode->update($request->except('_token', '_method'));

		return redirect()->route('maintenance.costcodes.index')->with('success', 'Costcode has been updated!!');

	}


	public function getLocationCostcode($id) {

		$locations = Location::find($id);

		return response()->json($locations->costcode()->where('isActive', 1)->get());

	}

}
