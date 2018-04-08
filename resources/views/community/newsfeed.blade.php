@extends('layouts.app')

@section('content')
        <h1>Community</h1><br>

        <a href="http://localhost:8000/">Home</a><br>
        <a href="http://localhost:8000/profiel">Profiel</a><br>
        <a href="http://localhost:8000/dashboard">Dashboard</a><br>
        <a href="http://localhost:8000/nieuwsposts">Nieuws</a><br>
        <a href="http://localhost:8000/contact">Contact</a><br>
        <a href="http://localhost:8000/resources">Resources</a><br>
        <a href="http://localhost:8000/community/create">Create Post</a><br>
        
        @if(count($nieuws) >= 1)
            @foreach($nieuws as $post)
                <div class='well'>
                    <h3><a href="/communitypost/{{$post->id}}">{{$post->title}}</a></h3>
                </div>
            @endforeach
        @else
            <p> No Nieuws Posts Yet</p>
        @endif
        
@endsection