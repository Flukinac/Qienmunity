@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>
<p>Welkom, {{auth()->user()->name}}</p>


<div class="container">
    <div class="row">
        
        <!--Nieuwposts tonen-->
        
        <div class="col-md-10 col-md-offset-1">          
            <a href='/nieuwsposts'><h2>Nieuws</h2></a>
            @foreach($nieuwspost as $post)
                <div class='well'>
                    <h3><a href="/nieuwsposts/{{$post->id}}">{{$post->title}}</a></h3>
                    <p>{!!str_limit($post->content, 300)!!}</p>
                    <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                </div>
            @endforeach
        </div>
        
        <!--Communitypost tonen-->
        
        <div class="col-md-10 col-md-offset-1">
            <a href='/communitypost'><h2>Community</h2></a>
            @foreach($commpost as $post)
                <div class='well'>
                    <h3><a href="/communitypost/{{$post->id}}">{{$post->title}}</a></h3>
                    <p>{!!str_limit($post->content, 300)!!}</p>
                    <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                </div>
            @endforeach
        </div>
        
        <!--Video-->
        
        <div class="col-md-10 col-md-offset-1">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/u9Mv98Gr5pY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        
        <!--Toon 2 nieuwste gebruikers-->
        
            <div class="col-md-10 col-md-offset-1">
                <a href='/profiles'><h2>Nieuwste gebruikers</h2></a>
                @foreach($profiles as $profile)
                    <div class='well'>
                        <a href="/profiles/{{$profile->id}}"><img width=50px src="{{ route('profile.image', ['filename' => $profile->username . '-' . $profile->user_id . '.jpg']) }}" alt="" class="img-responsive"></a>
                        <h3><a href="/profiles/{{$profile->id}}">{{$profile->username}}</a></h3>
                        <p>{!!str_limit($profile->biography, 300)!!}</p>
                    </div>
                @endforeach
            </div>
    </div>
</div>

@endsection
