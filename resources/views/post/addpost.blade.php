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
    <form  method="POST" action="{{url("/post/create")}}" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input type="hidden" value="{{ \Auth::user()->id }}" name="user_id"/>
         <input type="hidden" value="{{ \Auth::user()->name }}" name="user_name"/>
           <label>Title</label><br>
           <input name="title" type="text"></input>
           <br><br> 
           <label>Image </label><br>
           <input name="file" type="file" accept="image/*" ></input><br>
           <label>Description</label><br><br> 
           <textarea name="post" ></textarea>
           <br>
           <input type="checkbox" name="status" value="1"  > Public<br>
           <br>
           <button type="submit">Save</button>
           <button><a href="{{ url('/post') }}">Posts</a></button>
           @if ($errors->any())
               {!! implode('', $errors->all('<p style="color:red">:message</p>')) !!}
           @endif 
    </form>
    
   </div>
  </div>
@endsection