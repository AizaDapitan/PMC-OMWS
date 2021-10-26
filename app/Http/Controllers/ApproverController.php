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

        $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required'
        ]);
		   
        $name = "$request->lname, $request->fname  $request->mname";

        Approver::create([
            'name' => strtoupper($name),
			'isActive' => 1
        ]);

        return redirect()->route('maintenance.approvers.index')->with('success', 'Approver has been saved!!');	
	}    
	
    public function approver_update(Request $request)
    {
        
        Approver::find($request->nameid)->update([
            'name' => strtoupper($request->name)
        ]);

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

}
