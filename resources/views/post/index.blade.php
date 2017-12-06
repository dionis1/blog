@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height" style="
                align-items: center;
                display: flex;
                justify-content: center;">
 <div class="links" style="color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;">
     <button><a href="post/add" style="text-decoration: none"><h1>Add POST</h1></a></button>

     @foreach($posts as $post)
      <ul>
    	<li>Title: {{$post->title}}</li>
    	<li>Created: {{$post->created_at}}</li>
        <li><button><a href="post/show/{{$post->id}}">Read More</a></button>
        <button><a href="post/edit/{{$post->id}}">Edit</a></button>
        <button><a href="post/delete/{{$post->id}}">Delete</a></button></li>
      </ul>
     @endforeach
     {{ $posts->links() }}
     
 </div>
</div>
@endsection