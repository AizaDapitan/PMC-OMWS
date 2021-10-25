<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Approver;
use App\Services\RoleRightService;

class ApproverController extends Controller
{

	public function __construct(
		RoleRightService $roleRightService
	) {
		$this->roleRightService = $roleRightService;
	}
	public function index(Request $request)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Approvers");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

		$approvers = Approver::latest()
		 	->where(function ($query) use ($request) {
		 		if ($request->has('searchtxt') && $request->searchtxt != '') {
		 			$query->where('name', 'like', '%' . $request->searchtxt . '%');
		 		}
		 	})
			->paginate(15);
		
		return view('pages.approvers.index', compact(
			'approvers',
			'create',
			'edit',
			'delete'
		));
	}


	public function store(Request $request)
	{

		$data = $this->validate($request, [
			'lname'			=> 'required',
			'fname'			=> 'required',
			'mname'			=> ''
		]);

		$name = "{$data['lname']}, {$data['fname']} {$data['mname']}";

		Approver::create(['name' => strtoupper($name)]);

		return redirect()->route('maintenance.approvers.index')->with('success', 'Approver has been saved!!');
	}

	public function approver_update(Request $request)
	{

		$approver = Approver::find($request->nameid);
		$data = $this->validate($request, [
			'name'			=> 'required' 
		]);

		$approver->update($data);

		return redirect()->route('maintenance.approvers.index')->with('success', 'Approver has been updated!!');
	}	

    public function change_status(Request $request)
    {
        
		Approver::find($request->approverid)->update(['isActive' => $request->namestatus]);

        $status = "INACTIVE";

        if($request->namestatus == 1)
		{
            $status = "ACTIVE";
        }
				
        return back()->with('success', 'Approver status has been changed into ' . $status);
    }



	// public function update($id, Request $request)
	// {

	// 	$approver = Approver::find($id);

	// 	$approver->update($request->except(['_method', '_token']));

	// 	return redirect()->route('maintenance.approvers.index')->with('success', 'Approver has been updated!!');
	// }
}
