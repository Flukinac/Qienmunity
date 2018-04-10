@extends('layouts.app')

@section('content')
        

<a href="/communitypost" class="btn btn-default">< Ga terug</a><br/><br/>
  
        
        <h1>{{$post->titel}}</h1><br>
        <!--<img style="width:100%" src="/storage/cover_images/{{$post->image}}">-->
        <p>{{$post->content}}</p>
        <small>Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
        
        
@endsection
    
