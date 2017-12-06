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
    <form method="POST" action="{{url("/post/update")}}" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input type="hidden" value="{{ $post->id }}" name="id"/>
           <label>Title</label><br>
           <input name="title" type="text" value="{{$post->title}}"></input>
           <br>
           <label>Image</label><br>
           <input name="file" type="file" ></input>
           <br>
           <label>Description</label><br>
           <textarea name="post" >{{$post->post}}</textarea>
           <br>
           <input type="checkbox" name="status" value="1" > Public<br>
           <br>
           <button type="submit">Save Edit</button>
    </form>
    <button><a href="{{ url('/post') }}">Posts</a></button>
  </div>
</div>
@endsection