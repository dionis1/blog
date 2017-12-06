<?php

namespace App\Repositories;
use App\Post;

class PostRepository {

	public static function order(){
		return  Post::published()->orderBy('id' , 'desc')->get();
	}

	public static function deleteById($id)
    {
        return Post::destroy($id);
    }

    public static function getall($id)
    {
      return static::where("user_id","=",$id); 
    }
 }