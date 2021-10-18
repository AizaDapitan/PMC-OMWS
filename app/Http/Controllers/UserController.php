<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use Auth;
use App\Role;
use App\Services\UserService;
use App\Notifications\EmailNotification;
use App\Services\RoleRightService;

class UserController extends Controller
{
    public function __construct(
        UserService $userService
        // RoleRightService $roleRightService
    ) {
        $this->userService = $userService;
        // $this->roleRightService = $roleRightService;
    }
    public function index()
    {
        // $rolesPermissions = $this->roleRightService->hasPermissions("Users Maintenance");

        // if (!$rolesPermissions['view']) {
        //     abort(401);
        // }

        // $create = $rolesPermissions['create'];
        // $edit = $rolesPermissions['edit'];
        // $delete = $rolesPermissions['delete'];

        $create = true;
        $edit = true;
        $delete =true;

        $pagination = 15;

        $roles = Role::where('active', '1')->get();        
        $users = User::where('role', '<>', 'admin')->orderBy('name');

        $users = $users->paginate($pagination);
        return view('pages.users.index', compact('users','roles', 'create', 'edit', 'delete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolesPermissions = $this->roleRightService->hasPermissions("Users Maintenance");

        if (!$rolesPermissions['create']) {
            abort(401);
        }
        $pagename = 'Create User';

        $roles = Role::where('active', '1')->get();

        return view('maintenance.user.create', compact('pagename', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',

        ]);

        // 'password' => [
        //     'required',
        //     'max:150',
        //     'min:8',
        //     'regex:/[a-z]/', // must contain at least one lowercase letter
        //     'regex:/[A-Z]/', // must contain at least one uppercase letter
        //     'regex:/[0-9]/', // must contain at least one digit
        //     'regex:/[@$!%*#?&]/', // must contain a special character
        // ],
        // 'password_confirmation' => 'required|same:password',


        $result = $this->userService->create($request);
        $user = User::orderBy('id', 'desc')->first();
        if ($request->session()->get('success') == "User has been added successfully!") {
            $user->notify(new EmailNotification($user));

            return redirect(route('maintenance.users.index'))->with('success', 'User has been added.');
        } else {
            return $result;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // $rolesPermissions = $this->roleRightService->hasPermissions("Users Maintenance");

        // if (!$rolesPermissions['edit']) {
        //     abort(401);
        // }
        return response()->json($this->userService->getById($request->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->userService->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_status(Request $request)
    {
        User::find($request->userid)->update(['active' => $request->userstatus]);
        $status = "INACTIVE";
        if($request->userstatus == 1){
            $status = "ACTIVE";
        }
        return back()->with('success', 'User status has been changed into ' . $status);
    }

    public function reset_password(Request $request)
    {
        User::find($request->userid)->update([
            'password' => \Hash::make('password')
        ]);

        return back()->with('success', 'User password has been resetted.');
    }

    public function change_password()
    {
        $pagename = 'Change Password';

        return view('maintenance.user.change-password', compact('pagename'));
    }

    public function update_password(Request $request)
    {
        Validator::make($request->all(), [
            'new_password' => [
                'required',
                'max:150',
                'min:8',
                'regex:/[a-z]/', // must contain at least one lowercase letter
                'regex:/[A-Z]/', // must contain at least one uppercase letter
                'regex:/[0-9]/', // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm_password' => 'required|same:new_password',
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!\Hash::check($value, Auth::user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }]
        ])->validate();


        $is_updated = User::find(auth()->user()->id)->update(['password' => \Hash::make($request->confirm_password)]);

        if ($is_updated) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password successfully change. To login again, please use your new password!');
        } else {
            return back()->with('duplicate', 'Error changing password. Try again later.');
        }
    }
}
