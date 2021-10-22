<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleRightService;

class HomeController extends Controller
{

    public function __construct(
        RoleRightService $roleRightService
    ) {
        $this->roleRightService = $roleRightService;
    }
	public function index() {
    $rolesPermissions = $this->roleRightService->hasPermissions("Dashboard");

            if (!$rolesPermissions['view']) {
                abort(401);
            }

		return view('dashboard');

	}

	public function manual() {

		return \File::get(public_path() . '/omws-user-manual/Introduction.html');

	}

	public function updatePassword(Request $request) {

        $user = \Auth::user();
        $hasher = app('hash');

        $validate = $request->validate([
            'current_password'      => 'required',
            'new_password'          => 'required',
            'new_confirm_password'  => 'same:new_password'
        ]); 

        if ($hasher->check($request->current_password, $user->password)) {

            $user->update([
                'password'  => \Hash::make($request->new_password)
            ]);

            \Auth::logout();
            return redirect('/login');

        }

        \Session::flash('error_message', 'Something is wrong while trying to change the password');

        return back();

    }

}
