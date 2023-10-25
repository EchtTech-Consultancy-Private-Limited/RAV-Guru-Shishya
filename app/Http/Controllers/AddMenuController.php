<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Session;

class AddMenuController extends Controller
{
    public function add_menu(Request $request)
    {
        $menu=Menu::where('is_parent',0)->get();

        $allmenu=Menu::all();
        return view("menu.add-menu",compact("menu","allmenu"));
    }

    public function add_new_menu(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $menu=new Menu;
        
        if(!empty($request->parent_id))
        {
            $menu->is_parent=1;
        }
        else
        {
            $menu->is_parent=0;
        }
        $menu->name=$request->name;
        $menu->url=$request->url;
        if(!empty($request->parent_id))
        {
            $menu->parent_id=$request->parent_id;
        }
        else
        {
            $menu->parent_id=0;
        }
      
        $menu->save();
        return redirect('add-menu')->with('success','Menu created successfully');
    }

    public function edit_menu(Request $request,$id)
    {
        $menu=Menu::find($id);
        $menulist=Menu::where('is_parent',0)->get();
        return view("menu.edit",compact("menu","menulist"));
    }

    public function update_menu(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->name=$request->name;
        $menu->url=$request->url;
        if(!empty($request->parent_id))
        {
            $menu->parent_id=$request->parent_id;
        }
        else
        {
            $menu->parent_id=0;
        }
        $menu->update();
        return redirect('add-menu')->with('success','Menu Updated successfully');
    }

    public function delete_menu($id)
    {
        $menu=Menu::findOrFail($id);
        $menu->delete();
        return redirect('add-menu')->with('success','Menu Deleted successfully');
       
    }


        public function main_menu()
        {
            $data=Menu::get();
            return view('layouts.partials.sidebar',["data"=>$data]);
        }

}
