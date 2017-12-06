<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=["title","post"];

    

    public function comments()
    {

		return $this->hasMany(Comment::class);
    }

    public static function published(){

    	return static::where("status","=",1);
    }

    public function users()
    {

		return $this->belongsTo(User::class);
    }
}

