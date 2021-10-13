<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{


	public function index() {

		$categories = Category::orderBy('id','DESC')->paginate(15);

		return view('pages.categories.index', compact('categories'));

	}


	public function store(Request $request) {

		$data = $this->validate($request, [
			'name'			=> 'required'
		]);

		Category::create($data);

		return redirect()->route('maintenance.categories.index')->with('success', 'Category has been saved!!');

	}


	public function update($id, Request $request) {

		$costcode = Category::find($id);

		$costcode->update($request->except('_token', '_method'));

		return redirect()->route('maintenance.categories.index')->with('success', 'Category has been updated!!');

	}


}
