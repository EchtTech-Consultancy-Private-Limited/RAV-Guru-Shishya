<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\User;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');
            // $user = auth()->user();
            // User::where('id', $user->id)->update(['check_logged_in' => 0]);
            User::update(['check_logged_in' => 0]);
            return route('newLogin');
        }
    }
}
