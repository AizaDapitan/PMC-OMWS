<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Services\RoleRightService;

class CategoryController extends Controller
{
	public function __construct(
		RoleRightService $roleRightService
	) {
		$this->roleRightService = $roleRightService;
	}

	public function index(Request $request)
	{

		$rolesPermissions = $this->roleRightService->hasPermissions("Categories");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

        $categories = Category::orderBy('name')
        ->where(function($query) use ($request)
        {
			if($request->has('searchtxt') && $request->searchtxt != '') 
			{
				$query->where('name', 'like', '%'.$request->searchtxt.'%' )
				->orderBy('name');
        	}
        })
        
        ->paginate(15);
        
        return view('pages.categories.index', compact('categories', 'create', 'edit', 'delete'));
	}

	public function store(Request $request) {

        $request->validate([
            'name' => 'required'
        ]);
				
		Category::create([
			'name' => $request->name
		]);

		return redirect()->route('maintenance.categories.index')->with('success', 'Category has been saved!!');	
	}

    public function category_update(Request $request)
    {
		
		Category::find($request->nameid)->update([
			'name' => $request->name
		]);

		return redirect()->route('maintenance.categories.index')->with('success', 'Category has been updated!!');
    }	



	// public function update($id, Request $request)
	// {

	// 	$costcode = Category::find($id);

	// 	$costcode->update($request->except('_token', '_method'));

	// 	return redirect()->route('maintenance.categories.index')->with('success', 'Category has been updated!!');
	// }
}
