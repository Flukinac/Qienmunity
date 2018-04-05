@extends('layouts.app')

@section('content')
        

        <a href="http://localhost:8000/">Home</a><br>
        <a href="http://localhost:8000/profiel">Profiel</a><br>
        <a href="http://localhost:8000/dashboard">Dashboard</a><br>
        <a href="http://localhost:8000/community">Community</a><br>
        <a href="http://localhost:8000/contact">Contact</a><br>
        <a href="http://localhost:8000/resources">Resources</a><br>
  
        
        <h1>{{$post->titel}}</h1><br>
        <small>Geschreven op {{$post->created_at}}</small>
        
@endsection
    