<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\SystemConfigration;
use App\Models\User;
use App\Models\ChurnaYoga;
use File;
use Illuminate\Support\Facades\Auth;
use Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $shishya = User::where('user_type',3)->count();
        $guru = User::where('user_type',2)->count();
        $users = User::count();
        $patients = Patient::count();
        return view("pages.dashboard",compact('shishya','guru','users','patients'));
    }

    public function shishya(Request $request)
    {
        return view("pages.dashboard");
    }

    public function system_configration()
    {
        $system=SystemConfigration::orderBy('id','DESC')->first(); 
        return view('layouts.system-configration',compact('system'));
    }

    public function save_system_configration(Request $request)
    {
        $input=$request->all();   
            $input['long_description'] = $request->long_descp;
            $input['sort_description'] = $request->short_descp;
            $id=$request->id;
        if($id)
        {
           $syetem_configration=SystemConfigration::find($id);
           if($request->hasfile('logo'))
           {
            //dd("logo");
            File::delete('uploads/'.$syetem_configration->logo);
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $input['logo'] = $filename;
           }

          if($request->hasfile('favicon'))
           {
            //dd("favicon");
             File::delete('uploads/'.$syetem_configration->favicon);
            $file = $request->file('favicon');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            $input['favicon'] = $filename;
           }
           $syetem_configration->update($input); 
        }
        else
        {
            if($request->hasfile('logo'))
           {
            //dd("logo");
           
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            //dd($filename);
            $input['logo'] = $filename;
           }

        if($request->hasfile('favicon'))
           {
            //dd("favicon");
            $file = $request->file('favicon');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            $input['favicon'] = $filename;
           }
            $syetem_configration=SystemConfigration::create($input);
        }
        
        $system=SystemConfigration::orderBy('id','DESC')->first();
        return redirect('system-configration')->with('success', 'System Setting Updated Successfully');
    }

   


}
