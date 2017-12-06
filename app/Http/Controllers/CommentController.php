<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
   
   public function addComment(Request $request){
   
    $this->validate($request,[
            "body" => "required"
            
            
       ]);

    $comment = new Comment();

    $comment->body = $request->input('body');
    $comment->post_id = $request->input('post_id');
    $comment->user_name = $request->input('user_name');
    $comment->save();
   
   /*
   	Comment::create([
   		'body'=>$request->input("body"),
   		'post_id'=>$request->input("id")
   		]);
   	*/
   	return back();
   	
   }
}
