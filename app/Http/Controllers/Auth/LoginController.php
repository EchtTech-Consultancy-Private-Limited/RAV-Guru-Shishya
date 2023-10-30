<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;
use Session;
use Validator;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request['password'] = decode5t($request->password); #SKP

            $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'captcha' => 'required|captcha',
                          
            ],
              [
              'captcha.captcha'=>"Kindly check the captcha code you have entered."
              ]);

            $usercredentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]);

            $userDet = Auth::getProvider()->retrieveByCredentials($usercredentials);
            $user = Auth::attempt(['email' => $request->email, 'password' => $request->password,'status' => '1']);
            if($user == "true")
            $status=1;
            else
            $status=0;   
            
            if($user != "" && $status == 1)
            { 
                Auth::login($userDet, $request->get('remember'));
                $request->session()->regenerate();
                return redirect('/dashboard')->with('success', "User Login Successfully");
            }
            else
            {
                return Redirect::back()->with('Error', 'Your Credentials Not Match (Try Again)');
            }


        //    Auth::login($user, $request->get('remember'));

        //dd($credentials);
        
    }

    public function logout () {
    //logout user
    auth()->logout();
    // redirect to homepage
    return redirect('/');
    }


  public function myCaptcha()
    {
        return view('myCaptcha');
    }

      public function myCaptchaPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
        dd("You are here :) .");
    }

     public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }







}
