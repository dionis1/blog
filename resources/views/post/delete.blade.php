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
    <form method="POST" action="submitdelete">
     {{ csrf_field() }}
     <input type="hidden" value="{{ $post->id }}" name="id"/>
    	<li>Title: {{$post->title}}</li>
    	<li>Image: <img src="{{ asset('storage/'.$post->file) }}" alt="" style="width:150px;height:100px;"></li>
    	<li>Description: {{$post->post}}</li>
    	<li>Created: {{$post->created_at}}</li>
    	<li>Updated: {{$post->updated_at}}</li>

    	<button type="submit">Delete</button>
    </form>
    <button><a href="{{ url('/post') }}">Posts</a></button>
  </div>
</div>
@endsection