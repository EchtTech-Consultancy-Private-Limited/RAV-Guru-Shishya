<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use File;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_type_array=['Admin'=>'1','Guru'=>'2','Shishya'=>'3'];
        $data = User::orderBy('id','DESC')->where('user_type',2)->get();       
        return view('users.index',compact('data','user_type_array'))
            ->with('i', ($request->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $countries = Country::get(["name", "id"]);
        $add_user_btn=$request->add_user_btn;
        return view('users.create',compact('add_user_btn','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $this->validate($request, [
            'firstname'=>'required|regex:/^[a-zA-Z0-9\s]+$/',
            'lastname'=>'required|regex:/^[a-zA-Z0-9\s]+$/',
            'gender'=>'required',
            'profile_image' => 'required|mimes:jpeg,png,jpg|max:200',
            'e_sign'   => 'mimes:jpeg,png,jpg',
            'profile_image'   => 'mimes:jpeg,png,jpg',
            'email' => ['required','email','max:50','unique:users','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'mobile_no'=>'required|numeric|unique:users|min:10,mobile_no|digits:10',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',

        ]);
        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

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

           $user = User::create($input);
          
          /* DB::transaction(function()
           {
                $user = User::create($input);
                if( !$user )
                {
                    throw new \Exception('User not created for account');
                }
            });*/

        $testMailData = [
            'title' => 'You have successfully registered',
            'body' => 'Welcome to RAV Guru Shishya Parampara Portal. Please login on the portal with your login details'
            ];

         Mail::to($input['email'])->send(new SendMail($testMailData));




        //$user->assignRole($request->input('roles'));
        //return response()->json('User created successfully');

        if($input['user_type']==1)
        {
            return redirect('/rav-admin')
                        ->with('success','User created successfully');
        }
        elseif($input['user_type']==2)
        {
            return redirect()->route('users.index')
                        ->with('success','User created successfully');
        }

        elseif($input['user_type']==3)
        {
            return redirect('/shishya-list')
                        ->with('success','User created successfully');
        }



    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $id= decrypt($id);
        $countries = Country::get(["name", "id"]);
        $user=DB::table('users')->where('users.id',$id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        return view('users.edit',compact('user','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

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

        $this->validate($request, [
            'firstname' => 'required',
            'user_type' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'email' => 'required|email|max:50|unique:users,email,'.$id,
            'confirm-password' => 'same:password',
            'mobile_no'=>'required|numeric|min:10,mobile_no|digits:10',
            'e_sign'   => 'mimes:jpeg,png,jpg',
            'profile_image'   => 'mimes:jpeg,png,jpg',

        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->firstname = $request->firstname;
        if($request->password)
        {
            $user->password = Hash::make($request->password);

        }
        $user->title=$request->title;
        $user->gender=$request->gender;
        $user->middlename=$request->middlename;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->mobile_no=$request->mobile_no;
        $user->user_type=$request->user_type;
        
        if($request->user_type==2)
        {
           $user->gurutype=$request->gurutype;
           $user->shishyatype=''; 
        }
        elseif($request->user_type==3)
        {
            $user->gurutype='';
            $user->shishyatype=$request->shishyatype;
        }
        

        $user->guru_id=$request->guru_id;

        $user->country=$request->country;
        $user->state=$request->state;
        $user->city=$request->city;

        if($request->hasfile('e_sign'))
           {
            //dd("e_sign");
            File::delete('uploads/'.$user->e_sign);
            $file = $request->file('e_sign');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $user->e_sign = $filename;
           }
        if($request->hasfile('profile_image'))
           {
            //dd("profile_image");
            File::delete('uploads/'.$user->user_image);
            $file = $request->file('profile_image');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $user->user_image = $filename;
           }
        $user->update();
        if($user->user_type==1)
        {
            return redirect('/rav-admin')
                        ->with('success','User Updated successfully');
        }
        elseif($user->user_type==2)
        {
            return redirect()->route('users.index')
                        ->with('success','User Updated successfully');
        }

        elseif($user->user_type==3)
        {
            return redirect('/shishya-list')
                        ->with('success','User Updated successfully');
        }
        /*$user->update($input);*/
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');

        return Redirect::back()->with('success', 'Status Changed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function country_list()
    {
        //dd("yes");
        $country_list = Country::all();
        return response()->json($country_list);
    }

    public function user_delete($id)
    {
        $id= decrypt($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
