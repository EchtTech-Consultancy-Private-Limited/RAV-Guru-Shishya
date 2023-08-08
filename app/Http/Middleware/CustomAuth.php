<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//use App\Models\audit_log;
use Illuminate\Support\Facades\Auth;
use URL;
use Illuminate\Support\Facades\Route;

class CustomAuth
{
   
    public function handle(Request $request, Closure $next)
    {
        /*$data=new audit_log();
        $data->user_id=Auth::user()->id;
        $data->user_name=Auth::user()->name;
        $data->IP_address=getHostByName(getHostName());
        $data->action_event=Auth::user()->id;
        $data->datetime=date('d-m-Y');
        $data->action_event= basename(URL::current());
        $url=explode("/",URL::current());
        if(strlen($url[count($url)-1])>100){
            $data->action_event= $url[count($url)-2].'/'.dDecrypt($url[count($url)-1]);
        }
        $data->data=URL::current();
        $data->save();

      */

      //dd($request->route());
       
        if(isset(Auth::user()->id) && Auth::user()->id!==1){
            if(strpos(Route::currentRouteAction(),"@")!==false){
                
                    $action=str_replace('App\Http\Controllers\\','',Route::currentRouteAction());
                    //dd([checkRoute($action,$request->route()->methods[0])]);
                    if (!checkRoute($action,$request->route()->methods[0])){
                            //return redirect()->back()->with('error','you have no permission to perform this task');
                            //abort(404);
                            return redirect('/no-access')->with('error','you have no permission to perform this task');
                    }
            } else abort(404);
                           

        }
        return $next($request);
    }

 
}