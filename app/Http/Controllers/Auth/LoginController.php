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
use App\Http\Helpers\CustomCaptcha;


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
    public function index(){
      $CustomCaptchas = new CustomCaptcha;
      $CustomCaptch = $CustomCaptchas->generateRandomAdditionExpression();
      Session::put('capcode', $CustomCaptch['answer']);
      return view('auth.newlogin',['CustomCaptch' => $CustomCaptch]);
    }
    public function login(Request $request)
    {
            $request['password'] = decode5t($request->password); #SKP

            $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'captcha' => 'required',            
            ]);

            $usercredentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]);

            if(Session::get('capcode') != $request->captcha){
              //return response()->json(['message' => "Captcha Invalid!.",'status'=>401],401);
              return Redirect::back()->with('Error', 'Captcha Invalid!');
            }
            
            $userDet = Auth::getProvider()->retrieveByCredentials($usercredentials);
            // login code
            $loggedUser = User::where('email',$request->email)->first();
            if(config('constants.userLoggedIn') == 'on'){
              if( $loggedUser->check_logged_in == 1){
                  return Redirect::back()->with('Error', 'User Already Logged in ');
              }
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                Auth::login($userDet, $request->get('remember'));
                $agentName = $this->getBrowser();
                User::where('id', Auth::id())->update([
                    'check_logged_in' => 1,
                    'ip' => $request->ip(),
                    'user_agent' => $agentName['name'],
                ]);
                return redirect('/dashboard')->with('success', "User Login Successfully");
            }
            return Redirect::back()->with('Error', 'Your Credentials Not Match (Try Again)');
            // end login code
    }

    public function logout () {
        //logout user
        User::where('id', Auth::id())->update(['check_logged_in' => 0]);
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
    
    function getBrowser() {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
          $platform = 'linux';
        }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
          $platform = 'mac';
        }elseif (preg_match('/windows|win32/i', $u_agent)) {
          $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
          $bname = 'Internet Explorer';
          $ub = "MSIE";
        }elseif(preg_match('/Firefox/i',$u_agent)){
          $bname = 'Mozilla Firefox';
          $ub = "Firefox";
        }elseif(preg_match('/OPR/i',$u_agent)){
          $bname = 'Opera';
          $ub = "OPR";
        }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
          $bname = 'Google Chrome';
          $ub = "Chrome";
        }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
          $bname = 'Apple Safari';
          $ub = "Safari";
        }elseif(preg_match('/Netscape/i',$u_agent)){
          $bname = 'Netscape';
          $ub = "Netscape";
        }elseif(preg_match('/Edge/i',$u_agent)){
          $bname = 'Edge';
          $ub = "Edge";
        }elseif(preg_match('/Trident/i',$u_agent)){
          $bname = 'Internet Explorer';
          $ub = "MSIE";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
      ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
          // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
          //we will have two since we are not using 'other' argument yet
          //see if version is before or after the name
          if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
              $version= $matches['version'][0];
          }else {
              $version= $matches['version'][1];
          }
        }else {
          $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
          'userAgent' => $u_agent,
          'name'      => $bname,
          'version'   => $version,
          'platform'  => $platform,
          'pattern'    => $pattern
        );
      }
}
