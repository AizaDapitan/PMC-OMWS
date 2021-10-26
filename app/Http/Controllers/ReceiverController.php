<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Receiver;
use App\Services\RoleRightService;

class ReceiverController extends Controller
{
	public function __construct(
        RoleRightService $roleRightService
    ) {
        $this->roleRightService = $roleRightService;
    }
	public function index(Request $request)
	{
		$rolesPermissions = $this->roleRightService->hasPermissions("Receivers");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

		$receivers = Receiver::latest()
		 	->where(function ($query) use ($request) {
		 		if ($request->has('searchtxt') && $request->searchtxt != '') {
		 			$query->where('name', 'like', '%' . $request->searchtxt . '%');
		 		}
		 	})
			->paginate(15);
		
		return view('pages.receivers.index', compact(
			'receivers',
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

        Receiver::create([
            'name' => strtoupper($name),
            'isActive' => 1
        ]);

        return redirect()->route('maintenance.receivers.index')->with('success', 'Receiver has been saved!!');	
	}        

    public function receiver_update(Request $request)
    {
        
        Receiver::find($request->nameid)->update([
            'name' => strtoupper($request->name)
        ]);

        return redirect()->route('maintenance.receivers.index')->with('success', 'Receiver has been updated!!');

    }	        

    public function change_status(Request $request)
    {
        
		Receiver::find($request->receiverid)->update(['isActive' => $request->namestatus]);

        $status = "INACTIVE";

        if($request->namestatus == 1)
		{
            $status = "ACTIVE";
        }
				
        return back()->with('success', 'Receiver status has been changed into ' . $status);
    }

}
