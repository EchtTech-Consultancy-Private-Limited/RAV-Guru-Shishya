<?php
use Illuminate\Support\Facades\Crypt;
use App\Models\ModelPermission;
use App\Models\ModelName;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

    function format_user_id($type='',$id='',$created_at=''){
        //1 admin, 2 guru, 3 shishya
        if($type==2) return "RAVGURU-$id".($created_at!=''? '-'.date("Y",strtotime($created_at)):'');
        elseif($type==3) return "RAVSH-$id".($created_at!=''? '-'.date("Y",strtotime($created_at)):'');
        elseif($type==1) return "RAVADMIN-$id".($created_at!=''? '-'.date("Y",strtotime($created_at)):'');
        else return $id;
    }

    function format_patient_id($id){
        return "RAV-P-".(100000+$id);
    }
          


    function encode5t($str)
    {
    for($i=0; $i<5;$i++) //increase the level
    {
    $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
    }
    return $str;
    }


    //function to decrypt the string
    function decode5t($str)
    {
    for($i=0; $i<5;$i++)
    {
        $str=base64_decode(strrev($str));
    }
    return $str;
    }

    /*models for provide permisions*/
    function main_models()
    {
        $model = ModelName::orderBy('shorting','ASC')->get();
        return $model;
    }
    /*end models for provide permisions*/
    function showModelPermission($userType = '')
    {
        $data = ModelName::whereIn('user_type', [0,$userType])
                 ->orderBy('shorting', 'ASC')
                 ->get();
        return $data;
    }

    function main_menu()
    {
        $data = ModelName::orderBy('shorting','ASC')->whereparent_id('0')->where('module_action',0)->get();
        return $data;
    }

    function main_child($id = 0)
    {
        $child = ModelName::orderBy('shorting','ASC')->whereparent_id($id)->get();
        return $child;
    }

    function check_permission($modelId = '')
    {
        $permission = ModelPermission::where(['user_id' => Auth::id(), 'model_id' => $modelId])->value('permission_id');
        return $permission;
    }

    function get_guru_list($id = 0)
    {
        if($id>0){
            $guru=App\Models\User::select('id','title','firstname','middlename','lastname','e_sign')->where('user_type','2')->where('id',$id)->where('status','1')->get();
            return (count($guru)>0?$guru[0]:[]);
        } else {
            $gurus=App\Models\User::select('id','title','firstname','middlename','lastname','e_sign')->where('user_type','2')->where('status','1')->get();
            return $gurus;
            }

        // return ['id'=>'0','title'=>'Mr','firstname'=>'Guru1','middlename'=>'','lastname'=>'','e_sign'=>''];

    }

    function get_user_name($id)
    {
        $userlist=App\Models\User::where('id',$id)->first();
        if(!empty($userlist)){
            $username = $userlist->firstname.' '.$userlist->lastname;
            return $username;
        }
        else{
            $username = "--";    
            return $username;
        }
    }

    function get_profile_id($id)
    {
        $profile=App\Models\ProfileBasicInfo::orderBy('id','desc')->where('user_id',$id)->first();
        if($profile)
        {
            $profile_id = $profile->id;
        
            return $profile_id; 
        }
        return ;
        
    }

        function get_clinical_id($id)
    {
        $clinic=App\Models\ProfileClinical::orderBy('id','desc')->where('user_id',$id)->first();
        if($clinic)
        {
            $clinical_id = $clinic->id;
        
            return $clinical_id; 
        }
        return ;
        
    }

        function get_profile_id_step2($id)
    {
        $profile=App\Models\ProfileEducational::orderBy('id','desc')->where('user_id',$id)->first();
        if($profile)
        {
            $profile_id = $profile->id;
        
            return $profile_id; 
        }
        return ;
        
    }

    function get_specific_detail_id($id)
    {
        $specific=App\Models\ProfileSpecificDetails::orderBy('id','desc')->where('user_id',$id)->first();
        if($specific)
        {
            $specific_id = $specific->id;
        
            return $specific_id; 
        }
        return ;
        
    }

        function get_publication_id($id)
    {
        $publication=App\Models\ProfilePublication::orderBy('id','desc')->where('user_id',$id)->first();
        if($publication)
        {
            $publication_id = $publication->id;
        
            return $publication_id; 
        }
        return ;
        
    }

    

    #SKP
    function getUserModelRoutePermissions($user_id){
        $permissions=\App\Models\RouteName::select('route_names.*')
        ->Join('model_permissions', 'model_permissions.permission_id', '=', 'route_names.permission_id')
        ->Join('model_routes', function($join)
            {
            $join->on('model_routes.model_id', '=', 'model_permissions.model_id');
            $join->on('model_routes.route_id', '=', 'route_names.id');

            }
        )
        ->where('model_permissions.user_id', $user_id)->get();

        return $permissions;

    }


    function userAuthority()
    {

            $data=getUserModelRoutePermissions(\Auth::user()->id);

            $permission_id=[];

            if(isset($data) && count($data)>0){
            $permissions=[];
            foreach($data as $key=>$value)
            {
                $permissions[]=$value->path;
            }
            //dd($permissions);
            return  ['data'=>$data,'permissions'=>$permissions];
            }

            return false;
    }



    function getRoutePermissions()
    {
        /*$rememberTimeInSeconds = 3600;
        $cachedResult = Cache::remember('route_data', $rememberTimeInSeconds, function(){
        $data=userAthorty();
        return $data;
        });*/

        return userAuthority();
    }

    function checkRoute($route_name,$route_method='')
    {
        if(\Auth::user()->id==1) return true;
        $route_permissions=getRoutePermissions();
        // dd($route_permissions);
            if($route_permissions!=false){
            if($route_method=='' && in_array($route_name,$route_permissions['permissions']))
                return true;
            else {
                foreach($route_permissions['data'] as $key=>$value)
                {
                    if($route_method==$value->method && $route_name==$value->path){ return true; break;}
                }

                return false;
            }

        }

        return false;
    }

    function getRoutesByGroup(array $group = [])
    {
        $list = Route::getRoutes();
                //$list = \Route::getRoutes()->getRoutes();
                if (empty($group)) {
                    return $list;
                }

                $routes = [];
                foreach ($list as $route) {
                    $action = $route->getAction();
                    foreach ($group as $key => $value) {
                        if (empty($action[$key])) {
                            continue;
                        }
                        $actionValues = Arr::wrap($action[$key]);
                        $values = Arr::wrap($value);
                        foreach ($values as $single) {
                            foreach ($actionValues as $actionValue) {
                                if (Str::is($single, $actionValue)) {
                                    $routes[] = $route;
                                } elseif($actionValue == $single) {
                                    $routes[] = $route;
                                }
                            }
                        }
                    }
                }

                return $routes;
    }

    function getModels($path){
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, getModels($filename));
            }else{
                $out[] = substr($filename,0,-4);
            }
        }
        return $out;
    }

        function baseurl()
    {
        return $baseurl="{{url('/')}}";
    }

    function get_system_info()
    {
        $system_info=App\Models\SystemConfigration::orderBy('id','desc')->first();
        return $system_info;
    }

    if (!function_exists('getImagePath')) {
        function getImagePath($path)
        {
            return asset("uploads/$path");
        }
    }

    function permissionCheck()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }        
        $user = Auth::user();
        if($user->user_type == 4){
            $permissions = new \stdClass();
            $permissions->permission_id = 1;
            $permissions->add = 1;
            $permissions->edit = 1;
            $permissions->view = 1;
            $permissions->delete = 1;
            
            return $permissions;
        }
        $routeUri = Route::currentRouteName();
        $modelName = ModelName::where('route', $routeUri)
                    ->where(function($query) use ($user) {
                        $query->where('user_type', $user->user_type)
                        ->orWhere('user_type', 0);
                    })
                    ->first();
        if (!$modelName) {
            abort(404);
        }                   
        $modulePermission = ModelPermission::where('model_id', $modelName->id)
                            ->where('permission_id', 1)
                            ->where('user_id', $user->id)
                            ->first();
        if ($modulePermission === null) {
            $permissionCheck = null;
        } else {
            $permissionCheck = $modulePermission;
        }
        return $permissionCheck;
    }
    
?>
