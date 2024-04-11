<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelName;
use App\Models\User;
use App\Models\ModelPermission;
use App\Models\ModelRoute;
use App\Models\RouteName;
use App\Models\Menu;
use DB;
use Session;
use Redirect;

class ModelController extends Controller
{
    public function index()
    {
        $model=ModelName::orderBy('shorting','asc')->get();
        $modellist=ModelName::orderBy('shorting','asc')->where('is_parent',0)->get();
        return view('permission.model.index',compact('model','modellist'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'module_action' => 'required',
            'name' => 'required',
            'route' => 'required',
            'user_type' => 'required',
        ]);
        $model=new ModelName;
        $model->name=$request->name;



        if(!empty($request->parent_id))
        {
            $model->is_parent=1;
        }
        else
        {
            $model->is_parent=0;
        }
        $model->module_action=$request->module_action;
        $model->name=$request->name;
        $model->route=$request->route;
        $model->user_type=$request->user_type;
        $model->shorting=$request->shorting;
        if(!empty($request->parent_id))
        {
            $model->parent_id=$request->parent_id;
        }
        else
        {
            $model->parent_id=0;
        }
        $model->save();
        return redirect('admin-models')->with('success','Model Created Successfully');
    }

    public function edit_model(Request $request,$id)
    {   
        $model=ModelName::find($id);
        $modellist=ModelName::where('is_parent',0)->get();
        return view("permission.model.edit",compact("model","modellist"));


    }

    public function update_model(Request $request, $id)
    {
        $model = ModelName::findOrFail($id);
        $model->module_action=$request->module_action;
        $model->name=$request->name;
        $model->route=$request->route;
        $model->user_type=$request->user_type;
        $model->shorting=$request->shorting;
        if(!empty($request->parent_id))
        {
            $model->parent_id=$request->parent_id;
        }
        else
        {
            $model->parent_id=0;
        }
        $model->update();
        return redirect('admin-models')->with('success','Model Updated successfully');
    }

    public function delete_model($id)
    {
        $model=ModelName::findOrFail($id);
        $model->delete();
        return redirect('admin-models')->with('success','Model Deleted successfully');
       
    }

    public function assign_role($id)
    {
        $user=User::find($id);
        $permission=ModelPermission::where('permission_id',1)->where('user_id',$user->id)->get();
        $editpermission=ModelPermission::where('edit',2)->where('user_id',$user->id)->get();
        $viewpermission=ModelPermission::where('view',3)->where('user_id',$user->id)->get();
        $dltpermission=ModelPermission::where('delete',4)->where('user_id',$user->id)->get();
        $allSelected = ModelPermission::where('permission_id',1)->where('user_id',$user->id)->first();
        //dd("$permission");
        return view('permission.model.show-model-permissions',compact('allSelected','user','permission','editpermission','viewpermission','dltpermission'));

    }

    public function add_user_permissions(Request $request)
    {
        $existingPermission = ModelPermission::where('model_id', $request->model_id)
            ->where('user_id', $request->user_id)
            ->first();

        $data = [];
        if ($request->type == 'add') {
            $data['add'] = $request->permission_id;
            $data['permission_id'] = 1;
        } elseif ($request->type == 'edit') {
            $data['edit'] = $request->permission_id;
        } elseif ($request->type == 'view') {
            $data['view'] = $request->permission_id;
        } elseif ($request->type == 'delete') {
            $data['delete'] = $request->permission_id;
        }
        if ($existingPermission) {
            if ($request->action_id == 0) {
                ModelPermission::where('model_id', $request->model_id)
                    ->where('user_id', $request->user_id)
                    ->update([
                        $request->type => 0,
                        'permission_id' => $request->type == 'add' ? '2' : '1',
                    ]);
                return response()->json(['message' => 'Permission delete successfully']);
            } else {
                // Update or create based on existing permission
                $existingPermission->update($data);
                return response()->json(['message' => 'Permission updated successfully']);
            }
        } else {
            // Create new permission
            ModelPermission::create([
                'model_id' => $request->model_id,
                'user_id' => $request->user_id,
                'permission_id' => 1,
            ] + $data);

            return response()->json(['message' => 'Permission added successfully']);
        }
    }


    public function user_multiple_permissions(Request $request)
    {
        // Delete existing permissions for the given user and permission_id
        ModelPermission::where("user_id", $request->user_id)
            ->where("permission_id", $request->permission_id)
            ->delete();

        // Iterate through each model_id and add/update permissions
        foreach ($request->model_ids as $model_id) {
            $data = [];
            // Determine the type of permission based on the request
            switch ($request->type) {
                case 'add':                    
                    $data['add'] = $request->action_id == 0 ? 0 : $request->permission_id;
                    $data['permission_id'] = $request->action_id == 0 ? 2 : 1;
                    break;
                case 'edit':
                    $data['edit'] = $request->action_id == 0 ? 0 : $request->permission_id;
                    break;
                case 'view':
                    $data['view'] = $request->action_id == 0 ? 0 : $request->permission_id;
                    break;
                case 'delete':
                    $data['delete'] = $request->action_id == 0 ? 0 : $request->permission_id;
                    break;
                default:
                    // Handle invalid type
                    break;
            }

            // Check if the user already has permissions for the model_id
            $existingPermission = ModelPermission::where('model_id', $model_id)
                ->where('user_id', $request->user_id)
                ->first();

            if ($existingPermission) {
                // Update permissions for existing entry
                $existingPermission->update($data);
            } else {
                // Create new permissions entry
                ModelPermission::create([
                    'model_id' => $model_id,
                    'user_id' => $request->user_id,
                ] + $data);
            }
        }

        return response()->json(['success' => 'Permissions Granted Successfully']);
    }



    public function model_routes()
    {   
        //$model_routes=ModelRoute::all();
        
        $model_routes=DB::table('model_routes')->select('model_routes.*','route_names.method','route_names.name as route_name','route_names.path as route_path','model_names.name as model_name')
        ->join('route_names','model_routes.route_id','=','route_names.id')
        ->join('model_names','model_routes.model_id','=','model_names.id')
        ->get();
        //return $model_routes;
        $routes=RouteName::all();
        $models=ModelName::all();
        return view('permission.model.model-routes',compact('model_routes','routes','models'));
    }

    public function add_model_routes(Request $request)
    {
        $this->validate($request, [
            'model_id' => 'required',
            'route_id' => 'required',
        ]);
        $model_route=new ModelRoute;
        $model_route->model_id=$request->model_id;
        $model_route->route_id=$request->route_id;
        $model_route->save();
        return redirect('model-routes')->with('success','Model Routes Created Successfully');
    }

    public function edit_model_routes(Request $request,$id)
    {   
        $model_routes=ModelRoute::find($id);
        $routes=RouteName::all();
        $models=ModelName::all();

        return view("permission.model.edit-model-routes",compact("model_routes",'routes','models'));
    }
    
    public function update_model_routes(Request $request,$id)
    {
        $this->validate($request, [
            'model_id' => 'required',
            'route_id' => 'required',
        ]);
        $model_route=ModelRoute::find($id);
        $model_route->model_id=$request->model_id;
        $model_route->route_id=$request->route_id;
        $model_route->save();
        return redirect('model-routes')->with('success','Model Routes Updated Successfully');
    }

    public function delete_model_route(Request $request,$id)
    {
       $model_route=ModelRoute::find($id);
       $model_route->delete();
       return redirect('model-routes')->with('success','Model Routes Deleted Successfully');
    }

}
