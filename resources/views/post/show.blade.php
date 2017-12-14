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
    <ul>
    	<li>Title: {{$post->title}}</li>
      <br><br>
    	<li>Image: <img src="{{ asset('storage/'.$post->file) }}" alt="" style="width:150px;height:100px;"></li>
      <br><br>
    	<li>Description: {{$post->post}}</li>
      <hr>
      <li>Authtor : {{$post->user_name}}
       <ul>
        <li> Created: {{$post->created_at}}</li>
        <li> Updated: {{$post->updated_at}}</li>
       </ul>
      </li>
      <br><br>
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
    	
    
    <hr>
   <form method="POST" action="{{url('post/show/'.$post->id)}}">
    {{ csrf_field() }}
         <input type="hidden" value="{{ \Auth::user()->name }}" name="user_name"/>
         <input type="hidden" value="{{ $post->id }}" name="post_id"/>     
         <textarea style="width:600px; height: 100px;" placeholder="ADD your Comment"></textarea>
         <button type="submit">Add comment</button>
   </form>
   <button><a href="{{ url('/post') }}">Posts</a></button>
   <a  href=" edit/{{$post->id}} "><button>Edit</button></a>
   
   </ul>
  </div>
</div>
@endsection