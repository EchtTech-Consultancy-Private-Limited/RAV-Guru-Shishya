<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RouteName;
use App\Models\PermissionName;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $route=RouteName::all();
        $permission=PermissionName::all();

        return view("permission.routes.index",compact("route",'permission'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'path' => 'required',
            'method' => 'required',
            'permission_id' => 'required',

        ]);
        $route=new RouteName;
        $route->name=$request->name;
        $route->path=$request->path;
        $route->permission_id=$request->permission_id;
        $route->method=$request->method;
        $route->save();
        return redirect('admin-routes')->with('success','Route Created Successfully');
    }

    public function edit_route(Request $request,$id)
    {
        $route=RouteName::find($id);
        $permission=PermissionName::all();
        return view("permission.routes.edit",compact("route","permission"));
    }

    public function update_route(Request $request, $id)
    {
        $route = RouteName::findOrFail($id);
        $route->name=$request->name;
        $route->path=$request->path;
        $route->permission_id=$request->permission_id;
        $route->method=$request->method;
        $route->update();
        return redirect('admin-routes')->with('success','Route Updated Successfully');
    }

    public function delete_route($id)
    {
        $menu=RouteName::findOrFail($id);
        $menu->delete();
        return redirect('admin-routes')->with('success','Routes Deleted Successfully');

    }
}
