<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\EditePostRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
      
      if(Auth::user()){
       $id = Auth::user()->id;
       $data = [];
       $data['posts'] = Post::where("user_id","=",$id)->orderBy('id' , 'desc')->paginate(5);
      }
    	/*$data = [];
    	$data['posts'] = PostRepository::order();*/
    	return view('post.index' , $data);
    }

    public function show($id){
    	
    	 /*return $id;*/ 
    
    	$data = [];
    	$data['post'] = Post::find($id);
    	return view('post.show' , $data);
    
    }
    public function add(){
   
    	return view('post.addpost' );
    
    }

    public function create(Request $request){

    	$this->validate($request,[
            "title" => "required",
            "post" => "required"
            
       ]);

    	/*$post = new Post($request->all());*/

      $post = new Post();

      $post->title = $request->input("title");
      $post->post = $request->input("post");
      $post->user_id = $request->input("user_id");
      $post->user_name = $request->input("user_name");
      
      if($request->has('status')){

       $post->status = $request->input("status");
      }

      if($request->has('file'))
       {
        $file = $request->file('file');
        $filename = $request->file->getClientOriginalName();

        /*$file->move(public_path('image').'/'.$filename);*/

        $file->storeAS("/public", $filename);
        $file->move(public_path('file').'/'.$filename);
        $post->file = $filename; 
        
        
       }

    	$post->save();
        return redirect('/post');
    }


    public function edit($id){
    	$data = [];
        $data["post"] = Post::find($id);
        return view('post.edit', $data);
    }

    public function update(EditePostRequest $request )
    {   

        $post = Post::find($request->input("id"));
         /*$post = new Post($request->all());*/
        $post->title = $request->input("title");
        $post->post = $request->input("post");
        if($request->has('status')){

          $post->status = $request->input("status");
         }

        if($request->has('file'))
        {
        $file = $request->file('file');
        $filename = $request->file->getClientOriginalName();

        /*$file->move(public_path('image').'/'.$filename);*/

        $file->storeAS("/public", $filename);
        $file->move(public_path('file').'/'.$filename);
        $post->file = $filename; 
        
        
        }
        $post->save();
        
        return redirect('/post');
         /* return "yes";*/
        
        
    }

    public function delete($id)
    {
       $data = [];
       $data["post"] = Post::find($id);
       return view("post.delete", $data);
    }
    
    public function submitdelete(Request $request)
    {


      /*  
      $post = Post::find($id);
      $post->destroy();
      */
      /*
      $post =Post::find($id);
      $post->delete();
      */
      /*
       PostRepository::deleteById($id);
       */
       PostRepository::deleteById($request->input("id"));
       return redirect('/post')-> with('success', 'Post deleted !');
    }
}
