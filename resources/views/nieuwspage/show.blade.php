@extends('layouts.app')

@section('content')
        

<a href="/nieuwsposts" class="btn btn-default">< Ga terug</a><br/><br/>
  

        <h1>{{$post->title}}</h1><br>
        <p>{{$post->content}}</p>
        <small>Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
        
        
@endsection