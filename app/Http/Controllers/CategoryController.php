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

	public function index()
	{

		$rolesPermissions = $this->roleRightService->hasPermissions("Categories");

		if (!$rolesPermissions['view']) {
			abort(401);
		}

		$create = $rolesPermissions['create'];
		$edit = $rolesPermissions['edit'];
		$delete = $rolesPermissions['delete'];

		$categories = Category::orderBy('id', 'DESC')->paginate(15);

		return view('pages.categories.index', compact(
			'categories',
			'create',
			'edit',
			'delete'
		));
	}


	public function store(Request $request)
	{

		$data = $this->validate($request, [
			'name'			=> 'required'
		]);

		Category::create($data);

		return redirect()->route('maintenance.categories.index')->with('success', 'Category has been saved!!');
	}


	public function update($id, Request $request)
	{

		$costcode = Category::find($id);

		$costcode->update($request->except('_token', '_method'));

		return redirect()->route('maintenance.categories.index')->with('success', 'Category has been updated!!');
	}
}
