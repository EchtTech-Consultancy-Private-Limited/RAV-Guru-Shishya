<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPermission;

class AddPermissionController extends Controller
{
    public function add_permissions(Request $request)
    {    
        
         $permission=UserPermission::where('menu_id',$request->menu_id)->first();
         
         if(strlen($permission)>0)
         {
            $permission=UserPermission::where('menu_id',$request->menu_id)->first();
         }
         else
         {
            $permission=new UserPermission;
         }
         $permission->user_id=$request->user_id;
         $permission->menu_id=$request->menu_id;
         $permission->action_id=$request->action_id;
         
         if($request->checkboxvalue==1)
         {
            $permission->permission_id=1;
         }
         else
         {
            $permission->permission_id=0;
         }
         $permission->save();
        return response()->json(['success'=>'Permission Granted Successfully']);
    }
}
