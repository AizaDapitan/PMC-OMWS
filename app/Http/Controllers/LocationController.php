<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\CostcodeLocation;
use App\Costcode;
use App\Services\RoleRightService;

class LocationController extends Controller
{

    public function __construct(
        RoleRightService $roleRightService
    ) {
        $this->roleRightService = $roleRightService;
    }
    public function index(Request $request)
    {
        $rolesPermissions = $this->roleRightService->hasPermissions("Locations");

        if (!$rolesPermissions['view']) {
            abort(401);
        }

        $create = $rolesPermissions['create'];
        $edit = $rolesPermissions['edit'];
        $delete = $rolesPermissions['delete'];


        $locations = Location::latest()
            ->where(function ($query) use ($request) {
                if ($request->has('searchtxt') && $request->searchtxt != '') {
                    $query->where('name', 'like', '%' . $request->searchtxt . '%');
                }
            })
            ->orderBy('isActive')
            ->orderBy('name')
            ->paginate(15);
        $costcodes = Costcode::where('isActive', 1)->orderBy('name')->get();

        return view('pages.locations.index', compact(
            'locations',
            'costcodes',
            'create',
            'edit',
            'delete'
        ));
    }


    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Location::create($data);

        return redirect()->route('maintenance.locations.index')->with('success', 'Location has been saved!!');
    }


    public function update($id, Request $request)
    {

        $location = Location::find($id);

        $location->update($request->except('_method', '_token'));

        return redirect()->route('maintenance.locations.index')->with('success', 'Location has been updated!!');
    }


    public function detachCostcode($id, $costcodeID)
    {

        $location = Location::find($id);

        $location->costcode()->detach($costcodeID);
        return 'yes';
        return redirect()->route('maintenance.locations.index')->with('success', 'Location has been removed!!');
    }


    public function attachCostcode($id, $costcodeID)
    {

        $location = Location::find($id);

        // if( $c = $location->costcode()->where('costcode_id',$costcodeID)->first() ) {

        // return redirect()->route('maintenance.locations.index')->with('error_message', 'Costcode has been added already!!');

        // } else {

        $location->costcode()->attach($costcodeID);

        return 'yes';
        //}

        return redirect()->route('maintenance.locations.index')->with('success', 'Costcode has been added!!');
    }
}
