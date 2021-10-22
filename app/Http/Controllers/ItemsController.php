<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\Services\RoleRightService;

class ItemsController extends Controller
{

	public function __construct(
        RoleRightService $roleRightService
    ) {
        $this->roleRightService = $roleRightService;
    }
	public function index(Request $request) {
		$rolesPermissions = $this->roleRightService->hasPermissions("Items");

        if (!$rolesPermissions['view']) {
            abort(401);
        }

        $create = $rolesPermissions['create'];
        $edit = $rolesPermissions['edit'];
        $delete = $rolesPermissions['delete'];

		$items = Item::where('isNotActive', 0)->latest()
			->where(function($query) use ($request){
				if($request->has('searchtxt') && $request->searchtxt != '') {
					$query->where('name', 'like', '%'.$request->searchtxt.'%' )
						->orWhere('code', 'like', '%'.$request->searchtxt.'%');
				}
			})
			->orderBy('id','DESC')
			->paginate(15);

		$categories = Category::all();

		return view('pages.items.index', compact('items','categories','create', 'edit', 'delete'));

	}


	public function store(Request $request) {

		$data = $this->validate($request, [
			'code'			=> 'required' ,
			'name'			=> 'required' ,
			'uom'			=> 'required' ,
			'category'		=> 'required' ,
			'unit_cost'		=> 'required' ,
		]);

		$data['addedBy'] 	= auth()->user()->name;
		$data['addedDate']	= \Carbon\Carbon::now();

		Item::create($data);

		return redirect()->route('items.index')->with('success', 'Item has been saved!!');

	}


	public function update($id, Request $request) {

		$item = Item::find($id);

		$data = $this->validate($request, [
			'code'			=> 'required' ,
			'name'			=> 'required' ,
			'uom'			=> 'required' ,
			'category'		=> 'required' ,
			'unit_cost'		=> 'required' ,
		]);

		$item->update($data);

		return redirect()->route('items.index')->with('success', 'Item has been updated!!');

	}


	public function getItem($itemname) {

		$item = Item::where('name', 'like', '%'.$itemname.'%')
			->orWhere('code', 'like', '%'.$itemname.'%')
			->get();

		return response()->json($item);

	}

}
