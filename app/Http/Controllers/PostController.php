<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ProfileClinical;
  
class PostController extends Controller
{
    public function postCreate()
    {
        //$data1=Post::where('id',1)->first();

        $data1=ProfileClinical::where('id',1)->first();

        $data2= $data1->working_days;
        return gettype($data2);
        $dataall=Post::all();

        //return gettype($dataall);
          $dataall2= $dataall[2]->cat;
          //return $dataall2[0];
        

          //$data= $data1[0]->cat;
        return view('post',compact('data2'));
    }
  
    public function postData(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $user=Post::create($input);
        
        dd('Post created successfully.');
    }
}