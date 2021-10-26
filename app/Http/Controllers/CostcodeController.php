<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Costcode;
use App\Location;
use App\Services\RoleRightService;

class CostcodeController extends Controller
{
	public function __construct(
		RoleRightService $roleRightService
	) {
		$this->roleRightService = $roleRightService;
	}

	public function index(Request $request)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Cost Codes");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

		$costcodes = Costcode::latest()
			->where(function ($query) use ($request) {
				if ($request->has('searchtxt') && $request->searchtxt != '') {
					$query->where('name', 'like', '%' . $request->searchtxt . '%')
					->orWhere('description', 'like', '%'.$request->searchtxt.'%');
				}
			})
			->paginate(15);

		return view('pages.costcodes.index', compact(
			'costcodes',
			'create',
			'edit',
			'delete'
		));
	}

    public function store(Request $request) 
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
		        
        Costcode::create([
            'name' => strtoupper($request->name),
            'description' => $request->description,
			'isActive' => 1
        ]);

        return redirect()->route('maintenance.costcodes.index')->with('success', 'Costcode has been saved!!');	
	}

    public function costcode_update(Request $request)
    {        
        Costcode::find($request->nameid)->update([
            'name' => strtoupper($request->name),
            'description' => $request->description
        ]);

        return redirect()->route('maintenance.costcodes.index')->with('success', 'Costcode has been updated!!');
    }


    public function change_status(Request $request)
    {
        
		Costcode::find($request->costcodeid)->update(['isActive' => $request->namestatus]);

        $status = "INACTIVE";

        if($request->namestatus == 1)
		{
            $status = "ACTIVE";
        }
				
        return back()->with('success', 'Costcode status has been changed into ' . $status);
    }	


	public function getLocationCostcode($id)
	{

		$locations = Location::find($id);

		return response()->json($locations->costcode()->where('isActive', 1)->get());
	}
}
