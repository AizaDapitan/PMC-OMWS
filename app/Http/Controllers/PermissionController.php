<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Permission;
use App\Module;
use App\Services\RoleRightService;

class PermissionController extends Controller
{
    public function __construct(
        RoleRightService $roleRightService
    ) {
        $this->roleRightService = $roleRightService;
    }
	public function index(Request $request) 
    {
        $rolesPermissions = $this->roleRightService->hasPermissions("Permissions Maintenance");

        if (!$rolesPermissions['view']) {
            abort(401);
        }

        $create = $rolesPermissions['create'];
        $edit = $rolesPermissions['edit'];
        $delete = $rolesPermissions['delete'];

        $permissions = Permission::orderBy('module_type')
        ->orderBy('description')
        ->where(function($query) use ($request)
        {
            if($request->has('searchtxt') && $request->searchtxt != '') 
            {
                $query->where('description', 'like', '%'.$request->searchtxt.'%' )
                ->orderBy('module_type')
                ->orderBy('description');
            }
        })
        ->paginate(15);

        $modules = Module::orderBy('description','asc')->get();
        
        return view('pages.permissions.index', compact('permissions','modules','create', 'edit', 'delete'));
    
	}


	public function store(Request $request) {

        $request->validate([
            'module_type' => 'required',
            'description' => 'required',
        ]);
		
        if(Permission::where('module_type',$request->module_type)
        ->where('description',$request->description)
        ->exists())
		{
			return redirect()->route('maintenance.permissions.index')->with('error_message', 'Permission Name! already exists.');            
        } 
		else 
		{
            $status = $request->has('active');

            Permission::create([
                'module_type' => $request->module_type,
                'description' => $request->description,
                'active' => $status
            ]);

            return redirect()->route('maintenance.permissions.index')->with('success', 'Permission has been saved!!');
        }		
	}

	public function update($id, Request $request) {

		$permission = Permission::find($id);

		$permission->update($request->except(['_method', '_token']));

		return redirect()->route('maintenance.permissions.index')->with('success', 'Permission has been updated!!');

	}

    public function permission_update(Request $request)
    {
        if(Permission::where('module_type',$request->module_type)
        ->where('description',$request->description)
        ->where('id', '<>', $request->nameid)
        ->exists())        
		{
            return redirect()->route('maintenance.permissions.index')->with('error_message', 'Permission Name! already exists.');   
        } 
		else 
		{
            $status = $request->has('edit_active');

            Permission::find($request->nameid)->update([
                'module_type' => $request->module_type,
                'description' => $request->description,
                'active' => $status
            ]);

            return redirect()->route('maintenance.permissions.index')->with('success', 'Permission has been updated!!');
        }
    }	

}
