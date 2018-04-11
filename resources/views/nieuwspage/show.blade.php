@extends('layouts.app')

@section('content')
        

        <h1>{{$post->title}}</h1><br>
        <p>{{$post->content}}</p>
        <small>Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
        
        
@endsection
    