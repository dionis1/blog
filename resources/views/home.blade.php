@extends('layouts.app')

@section('content')
    <ul style="color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;">
      <li>Title: {{$post->title}}</li>
      <li>Image: <img src="{{ asset('storage/'.$post->file) }}" alt="" style="width:150px;height:100px;"></li>
      <hr>
      <li>Description: {{$post->post}}</li>
      <hr>
      <li>Authtor : {{$post->user_name}}
        <li> Created: {{$post->created_at}}</li>
        <li> Updated: {{$post->updated_at}}</li>
             </li>
      <li>Status: {{ $post->status == 1 ? "Public" : "Private" }}</li>
      <hr>
      <li>Comments</li>
      @foreach($post->comments as $comment)
           
           <ul>
               <ul>
                  <li>{{$comment->user_name}} : {{$comment->body}} - {{$comment->created_at->diffForHumans()}}  </li>
                  
                </ul>
           </ul>
         @endforeach
      @if (Route::has('login'))
       @auth
       <form method="POST" action="{{url('post/show/'.$post->id)}}">
        {{ csrf_field() }}
         <input type="hidden" value="{{ \Auth::user()->name }}" name="user_name"/>
         <input type="hidden" value="{{ $post->id }}" name="post_id"/>     
         <textarea name="body" placeholder="ADD your Comment"></textarea>
         <button type="submit">Add comment</button>
       </form>
       @else
       <p> You need to login or register </p>
        <button><a href="{{ route('login') }}">Login</a></button> 
        <button><a href="{{ route('register') }}">Register</a></button>
       @endauth
      @endif
      </ul>
@endsection
