<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelName;
use App\Models\ModelPermission;
use Illuminate\Support\Facades\Route;

class ModulePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        if($user->user_type != 4){
            $routeUri = Route::currentRouteName();
            // dd($routeUri);
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
            if (!$modulePermission) {
                return response()->view('errors.402', [], 403); 
                // abort(403, 'Module not permitted. Please contact the appropriate authority for assistance.');
            }
        }
        return $next($request);
    }

}