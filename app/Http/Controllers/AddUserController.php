<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RavUser;
use App\Models\Country;
use App\Models\ProfileBasicInfo;
use App\Models\ProfileLanguage;
use App\Models\ProfileClinical;
use App\Models\ProfileEducational;
use App\Models\ProfilePublication;
use App\Models\ProfileSpecificDetails;
use DataTables;
use Validator;
use DB;
use File;
use Auth;
use Cookie;
use Hash;
use Redirect;
use Session;
use Illuminate\Support\Arr;
use Mail;
use App\Mail\SendMail;

class AddUserController extends Controller
{
    

    public function show_user(Request $request)
    {
        //dd("dsd");
        $user=User::all();
        return response()->json($user);
        //return view("users.add-user");

    }

     public function user_delete($id)
    {
        
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function user_sign_up()
    {
        $countries = Country::get(["name", "id"]);
        $user_type=['2'=>'Guru','3'=>'Shishya'];
        return view("auth.sign-up",compact('user_type','countries'));
    }

    public function sign_up(Request $request)
    {
        //dd($request->user_type);
        if($request->user_type==2)
        {

           $request->validate(
            [
                'user_type' => 'required',
                'gurutype' => 'required',

           ]);
        }
        else if($request->user_type==3)
        {
            $request->validate(
            [
                'user_type' => 'required',
                'shishyatype' => 'required',

           ]);
        }
        $request->validate(
            [
                'title' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'gender' => 'required',
                'firstname' => 'required|max:32|min:2',
                'lastname' =>'required|max:32|min:2',
                'email' => ['required','email','max:50','unique:users','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'mobile_no'=>'required|numeric|unique:users|min:10,mobile_no|digits:10',
                'captcha'=> 'required|captcha',
           ],
           [
            'captcha.captcha'=>"Invalid captcha code."
           ]
       );

           //Userdetails for mail

           $userEmail = $request->email;

           

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);


       /* DB::transaction(function($input)
        {
             $user = User::create($input);
             if( !$user )
             {
                 throw new \Exception('User not created for account');
             }
         });*/

          //Mail sending scripts starts here
          $testMailData = [
            'title' => 'You have successfully registered',
            'body' => 'Welcome to RAV Guru Shishya Parampara Portal. Please login on the portal with your login details'
            ];

            Mail::to($userEmail)->send(new SendMail($testMailData));
           //Mail sending script ends here

        return redirect('login')->with('success', 'You have successfully registered');
    }

    public function edit_manage_profile_education(Request $request)
    {
        //dd($request->education_id);
        $education=ProfileEducational::where('id',$request->education_id)->first();

        if(strlen($education->upload_degree)>0)
        {
          $education->upload_degree=url('uploads/').'/'.$education->upload_degree;  
        }
        return response()->json($education);
    }

      public function edit_manage_profile_publication(Request $request)
    {
       // dd($request->publication_id);
        $publication=ProfilePublication::where('id',$request->publication_id)->first();
        return response()->json($publication);
    }

    public function manage_profile(Request $request)
    {
        Session::forget('basic_info');

        $id=Auth::user()->id;
        $countries = Country::get(["name", "id"]);

        /*basic information record*/
        $profile_record=DB::table('users')
            ->select('profiles_basic_info.*', 'users.*','profiles_basic_info.id as profile_id','users.id as user_table_id','cities.name as city_name','states.name as state_name')
            ->join('profiles_basic_info', 'users.id', '=', 'profiles_basic_info.user_id')
            ->join('cities','users.city', '=', 'cities.id')
            ->join('states','users.state', '=', 'states.id')
            ->where('users.id',Auth::user()->id)
            ->get();

            //return $profile_record[0]->mobile_no;
            if(count($profile_record)==0)
            {   
                //dd("yes");
                $profile_record=User::where('id',Auth::user()->id)->get();
            }
            
            $per_profile_record=DB::table('users')
            ->select('profiles_basic_info.*', 'users.*','profiles_basic_info.id as profile_id','users.id as user_table_id','cities.name as per_city_name','states.name as per_state_name')
            ->join('profiles_basic_info', 'users.id', '=', 'profiles_basic_info.user_id')
            ->join('cities','profiles_basic_info.per_city', '=', 'cities.id')
            ->join('states','profiles_basic_info.per_state', '=', 'states.id')
            ->where('users.id',Auth::user()->id)
            ->get();
        /*end basic information record*/
         
         
        /*educational record*/
        $educational_record=ProfileEducational::where('user_id',$id)->get();


       // return $per_profile_record[0];
           $language_record=ProfileLanguage::where('user_id',Auth::user()->id)->get();
        
          $form_step_type= Session::get('session_for_redirections');
         if(empty($form_step_type))
         {  
           $form_step_type="withour-session-step";
         }

        

        //publication record
        $publication_record=ProfilePublication::where('user_id',$id)->get();

        //specific details
         $specific_details_record=ProfileSpecificDetails::orderBy('id','desc')->where('user_id',Auth::user()->id)->first();

          //step3
         $clinic=ProfileClinical::orderBy('id','desc')->where('user_id',Auth::user()->id)->first();

          $clinic_record=DB::table('profiles_clinical')
            ->select('profiles_clinical.*','cities.name as city_name','states.name as state_name')
            ->join('cities','profiles_clinical.city', '=', 'cities.id')
            ->join('states','profiles_clinical.state', '=', 'states.id')
            ->where('profiles_clinical.user_id',Auth::user()->id)
            ->first();
        if(empty($clinic_record))
        {
            $clinic_record=ProfileClinical::orderBy('id','desc')->where('user_id',Auth::user()->id)->first();

        }

        //return $clinic_record;
        
      
        
        if($clinic)
        {
            $clinic_working_record = $clinic->working_days;
            $clinic_morning_timing = $clinic->clinic_morning_timing;
            $clinic_evening_timing = $clinic->clinic_evening_timing;
            //return gettype($clinic_working_record);
            return view("users.multi-step",compact('form_step_type','countries','profile_record','per_profile_record','language_record','educational_record','form_step_type','clinic','clinic_working_record','clinic_record','publication_record','specific_details_record','clinic_morning_timing','clinic_evening_timing'));
        }
        
        
        
        return view("users.multi-step",compact('form_step_type','countries','profile_record','per_profile_record','language_record','educational_record','form_step_type','clinic','publication_record','specific_details_record'));
    }

       

    public function manage_profile_form(Request $request)
    {
        $formId = $request->input('form_step_type');
        if ($formId === 'step1') {
            // Validate form 1 fields
            $this->validate($request, [
                'firstname' => 'required|max:250',
                'middlename' => 'max:200',
                'lastname' => 'max:200',
                'email' => 'required',
                'date_of_birth' => 'required',
                'age' => 'required|numeric',
                'f_name' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'pincode' => 'required|numeric',
                'aadhaar_no' => 'required|numeric',
                'pan_no' => 'required',
                'e_sign'   => 'required|mimes:jpeg,png,jpg|max:200',
                'profile_image'   => 'mimes:jpeg,png,jpg|max:200',
                'mobile_no' => 'required|min:10',
                'title' => 'required',
        ],[
            'firstname.required' => 'First name is required',
            'email' => 'Email is required',
            'date_of_birth.required' => 'Date of birth is required',
            'age.required' => 'Age is required and must be integer',
            'f_name.required' => 'Father name is required',
            'address1.required' => 'Address is required',
            'address2.required' => 'Address is required',
            'country.required' => 'Country is required',
            'state.required' => 'State is required',
            'city.required' => 'City is required',
            'pincode.required' => 'Pincode is required',
            'aadhaar_no.required' => 'Aadhar number is required',
            'pan_no.required' => 'Pan number is required',
            'e_sign.required'   => 'E-signature is required jpeg,png,jpg',
            'profile_image.required|'   => 'Profile is jpeg,png,jpg',
            'mobile_no.required' => 'Mobile number is required',
            'title.required' => 'Title is required',
        ]);
        } elseif ($formId === 'step2') {
            $this->validate($request, [
                'course_name' => 'required',
                'institute_name' => 'max:200|min:2',
        ],[
            'course_name.required' => 'Field is required',
            'institute_name.max' => 'Length should be maximum 200 and minium 2',
        ]);
        }

        //return $request->all();
        $profile_id=$request->profile_id;
        $user_id=$request->user_id;
        $input=$request->all();dd($request->all());

            $form_step_type=$request->form_step_type;
       
            $id=Auth::user()->id;
            $countries = Country::get(["name", "id"]);
            /*$basic_info="Your Basic Information Saved Successfully";
            Session::put('basic_info', $basic_info);
            $basic_info_session= Session::get('basic_info');*/
            //return $basic_info_session;

        if($request->form_step_type=="step1")
        {
        if($profile_id!='' && $request->form_step_type=="step1")
        {
            
           //update data in basic profiles table
            $user_profile=ProfileBasicInfo::find($profile_id);
            $user_profile->update($input);
           
           //add data in user language table

                  $lang_name=$request->lang_name;
                 $reading=$request->reading;
                $writing=$request->writing;
                $speaking=$request->speaking;
                $user_id=$request->user_id;
                 $lang_id=$request->lang_id;
            
            if($request->lang_name)
            {


            for($i=0; $i<count($lang_name); $i++)
                {

                   $lang=ProfileLanguage::where('id',$lang_id[$i])->first();
                   //return $lang[1];
                   if($lang)
                   {
                       //dd("update");
                       $lang_record=ProfileLanguage::where('id',$lang_id[$i])->first();
                       $lang_record->lang_name=$lang_name[$i];
                       $lang_record->reading=$reading[$i];
                       $lang_record->writing=$writing[$i];
                       $lang_record->speaking=$speaking[$i];
                       $lang_record->user_id=$user_id;
                       $lang_record->save();
                   }
                   else
                   {
                       //dd("add");
                       $lang_record=new ProfileLanguage;
                       $lang_record->lang_name=$lang_name[$i];
                       $lang_record->reading=$reading[$i];
                       $lang_record->writing=$writing[$i];
                       $lang_record->speaking=$speaking[$i];
                       $lang_record->user_id=$user_id;
                       $lang_record->save();
                   } 

                }
             }

            //update data in user table
             
           $profile=User::find($user_id);
           
           if($request->hasfile('e_sign'))
           {
            //dd("yes");
            $file = $request->file('e_sign');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $input['e_sign'] = $filename;
           }
            if($request->hasfile('profile_image'))
               {
                //dd("yes");
                $file = $request->file('profile_image');
                $name = $file->getClientOriginalName();
                $filename = time().$name;
                $file->move('uploads/',$filename);
                //dd($filename);
                $input['user_image'] = $filename;
               }
           $profile->update($input);
           
        }
        else
        {
            //dd("else");
            ProfileBasicInfo::create($input);
            
        }

    }

        

        //fetch profile record
            $profile_record=DB::table('users')
            ->select('profiles_basic_info.*', 'users.*','profiles_basic_info.id as profile_id','users.id as user_table_id','cities.name as city_name','states.name as state_name')
            ->join('profiles_basic_info', 'users.id', '=', 'profiles_basic_info.user_id')
            ->join('cities','users.city', '=', 'cities.id')
            ->join('states','users.state', '=', 'states.id')
            ->where('users.id','=',$id)->get();
            //return $profile_record;
            if(count($profile_record)==0)
            {
                //dd("yes");
                $profile_record=User::where('id',Auth::user()->id)->get();
            }

            $per_profile_record=DB::table('users')
            ->select('profiles_basic_info.*', 'users.*','profiles_basic_info.id as profile_id','users.id as user_table_id','cities.name as per_city_name','states.name as per_state_name')
            ->join('profiles_basic_info', 'users.id', '=', 'profiles_basic_info.user_id')
            ->join('cities','profiles_basic_info.per_city', '=', 'cities.id')
            ->join('states','profiles_basic_info.per_state', '=', 'states.id')
            ->where('profiles_basic_info.user_id',Auth::user()->id)
            ->get();
        $language_record=ProfileLanguage::where('user_id',Auth::user()->id)->get();
        //return $language_record;

        //second form code
        if($request->form_step_type=="step2" )
        {
            //return $request->method();
            if(isset($_POST['educational']) && $request->educational == "educational-form")
            {   
                //dd("add");

                
                $education=ProfileEducational::where('id',$request->education_id)->first();
                //dd("$education");
                if($education)
                { 
                    $education=ProfileEducational::where('id',$request->education_id)->first();
                    $education->user_id=Auth()->user()->id;
                    $education->institute_name=$request->institute_name;
                    $education->course_name=$request->course_name;
                    $education->year_of_passing=$request->year_of_passing;

                    if($request->hasfile('upload_degree'))
                       {
                        //dd("yes");
                        $file = $request->file('upload_degree');
                        $name = $file->getClientOriginalName();
                        $filename = time().$name;
                        $file->move('uploads/',$filename);
                        //dd($filename);
                        $education->upload_degree = $filename;
                       }

                    $education->save();
                }
                else
                {

                    $education=new ProfileEducational;
                    $education->user_id=$request->user_id;
                    $education->institute_name=$request->institute_name;
                    $education->course_name=$request->course_name;
                    $education->year_of_passing=$request->year_of_passing;

                    if($request->hasfile('upload_degree'))
                       {
                        //dd("yes");
                        $file = $request->file('upload_degree');
                        $name = $file->getClientOriginalName();
                        $filename = time().$name;
                        $file->move('uploads/',$filename);
                        //dd($filename);
                        $education->upload_degree = $filename;
                       }
                       
                    $education->save();
                }
                
                


            }
            
            else
            {
                 dd("reload");
            }
           

            /*educational record*/
           /* $form_step_type=$request->form_step_type;
           $educational_record=ProfileEducational::where('user_id',$id)->get();*/

        /*return view("users.multi-step",compact('form_step_type','countries','profile_record','per_profile_record','language_record','educational_record'));*/
        }
        
        //here we create session for user redirection and we use this session above function
        $session_for_redirection=$request->form_step_type;
        Session::put('session_for_redirections', $session_for_redirection);
        $session_for_redirections= Session::get('session_for_redirections');

        return redirect('/profile')->with('success',"Profile Updated Successfully");
        //return view("users.multi-step",compact('form_step_type','countries','basic_info_session','lang','profile_record','per_profile_record','language_record'));
    }

    public function manage_profile_form_step3(Request $request)
    { 
        $this->validate($request, [
                'weekend_off' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'country' => 'required',
        ],[
            'weekend_off.required' => 'Weekend Off is required',
            'address1.required' => 'Address is required',
            'address2.required' => 'Address is required',
            'country.required' => 'Country is required',
        ]);  
       // return $request->all();
        $clinical_id=$request->clinical_id;
        $input=$request->all();
        if($clinical_id!='' && $request->form_step_type=="step4")
        {
            //dd("yes");
           //update data in basic profiles table
            if($request->any_done_services)
            {
                $input['any_done_services']=$request->any_done_services=1;
            }
            else
            {
                $input['any_done_services']=$request->any_done_services=0;
            }
            $user_clinic_profile=ProfileClinical::find($clinical_id);
            $user_clinic_profile->update($input);
        }

        else
        {
            //dd("else");
            /*$input['working_days']=json_encode($request->working_days);
            $input['clinic_morning_timing']=json_encode($request->clinic_morning_timing);
            $input['clinic_evening_timing']=json_encode($request->clinic_evening_timing);*/
            ProfileClinical::create($input);
            
        }
        $session_for_redirection=$request->form_step_type;
        Session::put('session_for_redirections', $session_for_redirection);
        $session_for_redirections= Session::get('session_for_redirections');

        return redirect('/profile')->with('success',"Profile Updated Successfully");
    }

    
    public function manage_profile_form_step4(Request $request)
    {
        //dd("clinical details");
        $publication_id=$request->publication_id;
        $input=$request->all();
        if($publication_id!='' && $request->form_step_type=="step4")
        {
            
           //update data in profiles clinical  table
            $publication_profile=ProfilePublication::find($publication_id);
            $publication_profile->update($input);
        }

        else
        {
           
        
            ProfilePublication::create($input);
            
        }
        $session_for_redirection=$request->form_step_type;
        Session::put('session_for_redirections', $session_for_redirection);
        $session_for_redirections= Session::get('session_for_redirections');

        return redirect('/profile')->with('success',"Profile Updated Successfully");
    }

    public function manage_profile_form_step5(Request $request)
    {
        //dd("yes");
        $specific_id=$request->specific_id;
        $input=$request->all();
        if($specific_id!='' && $request->form_step_type=="step5")
        {
            
           //update data in basic profiles table
            $specific=ProfileSpecificDetails::find($specific_id);
            $specific->update($input);
        }

        else
        {
           
        
            ProfileSpecificDetails::create($input);
            
        }
        $session_for_redirection=$request->form_step_type;
        Session::put('session_for_redirections', $session_for_redirection);
        $session_for_redirections= Session::get('session_for_redirections');

        return redirect('/profile')->with('success',"Profile Updated Successfully");
    }
    public function education_delete(Request $request)
    {    
         $education_id=$request->education_dlt_id;
         $education=ProfileEducational::find($education_id);
         $education->delete();
         $session_for_redirection=$request->form_step_type;
        Session::put('session_for_redirections', $session_for_redirection);
        $session_for_redirections= Session::get('session_for_redirections');
         return redirect()->back()->with("danger","Education Deleted Successfully");
    }

     public function publication_delete(Request $request)
    {    
         $publication_dlt_id=$request->publication_dlt_id;
         $publication=ProfilePublication::find($publication_dlt_id);
         $publication->delete();
         $session_for_redirection=$request->form_step_type;
        Session::put('session_for_redirections', $session_for_redirection);
        $session_for_redirections= Session::get('session_for_redirections');
         return redirect()->back()->with("danger","Publication Deleted Successfully");
    }

    public function language_delete($lang_id)
    {    
       
         $lang=ProfileLanguage::find($lang_id);
         $lang->delete();
         return redirect()->back()->with("danger","Language Deleted Successfully");
    }


    public function shishya_list(Request $request)
    {

        $user_type_array=['Admin'=>'1','Guru'=>'2','Shishya'=>'3'];
        if(Auth::user()->user_type=='1')
            $data = User::orderBy('id','DESC')->where('user_type',"3")->get();
        else if(Auth::user()->user_type=='2')
            $data = User::orderBy('id','DESC')->where('guru_id',Auth::user()->id)->where('user_type',"3")->get();
        else
            abort(404);

         //dd("$data");
        return view('users.index',compact('data','user_type_array'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


   

    public function rav_admin(Request $request)
    {

        $user_type_array=['Admin'=>'1','Guru'=>'2','Shishya'=>'3'];
        $data = User::orderBy('id','DESC')->where('user_type',"1")->get();
        
        return view('users.index',compact('data','user_type_array'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function active_user($id)
    {
        $id= decrypt($id);
        $user=User::find($id);
        $user->status=($user->status==1?'0':'1');
        $user->update();
        return Redirect::back()->with('success', 'Status Changed Successfully');
    }

    public function unauthorized()
    {
        return view("unauthorized");
    }

    public function system_settings(Request $request)
    {
        dd("red");
    }

}
