<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Role;

class RoleController extends Controller
{

	public function index(Request $request) 
	{

        $roles = Role::orderBy('name')
        ->where(function($query) use ($request)
        {
			if($request->has('searchtxt') && $request->searchtxt != '') 
			{
				$query->where('name', 'like', '%'.$request->searchtxt.'%' )
				->orderBy('name');
        	}
        })
        
        ->paginate(15);
        
        return view('pages.roles.index', compact('roles'));

	}


	public function store(Request $request) {

        $request->validate([
            'role' => 'required',
            'description' => 'required',
        ]);
		
        if (Role::where('name', strtoupper($request->role))->exists()) 
		{
			return redirect()->route('maintenance.roles.index')->with('error_message', 'Role Name! already exists.');            
        } 
		else 
		{
            $status = $request->has('active');

            Role::create([
                'name' => strtoupper($request->role),
                'description' => $request->description,
                'active' => $status
            ]);

            return redirect()->route('maintenance.roles.index')->with('success', 'Role has been saved!!');
        }		
	}

	public function update($id, Request $request) {

		$role = Role::find($id);

		$role->update($request->except(['_method', '_token']));

		return redirect()->route('maintenance.roles.index')->with('success', 'Role has been updated!!');

	}

    public function role_update(Request $request)
    {

        if (Role::where('name', strtoupper($request->name))
            ->where('id', '<>', $request->nameid)
            ->exists()
        ) 
		{
            return redirect()->route('maintenance.roles.index')->with('error_message', 'Role Name! already exists.');   
        } 
		else 
		{
            $status = $request->has('edit_active');

            Role::find($request->nameid)->update([
                'name' => strtoupper($request->name),
                'description' => $request->description,
                'active' => $status
            ]);

            return redirect()->route('maintenance.roles.index')->with('success', 'Role has been updated!!');
        }
    }	

}
