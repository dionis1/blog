<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['posts'] = Post::all();
    	return view('post.index' , $data);
    }
    public function show(){
          $data =[];
          $data['posts'] = Post::where('status','=',1)->orderBy('id' , 'desc')->paginate(5);
          return view('welcome' , $data);
    }
      
    public function postshow($id){
        $data = [];   
        $data['post'] = Post::find($id);
        return view('home' , $data);

 }
}
