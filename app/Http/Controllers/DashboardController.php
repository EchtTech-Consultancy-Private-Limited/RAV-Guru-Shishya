<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemConfigration;
use File;
use Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
       return view("pages.dashboard");
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
            $input['short_description'] = $request->short_descp;
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