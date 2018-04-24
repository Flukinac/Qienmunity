@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>
<h4>Welkom bij jouw Qienmunity, {{auth()->user()->name}}!</h4>


<div class="container">
    <div class="row">
        <!--Nieuwposts tonen-->
            <div class="col-lg-6">   
                
                <a href='/nieuwsposts'><h2>Nieuws</h2></a>
                       <div class="well" style="box-shadow: 10px 10px 5px #aaaaaa;">
                            @foreach($nieuwspost as $post)
                            <div>
                                <div class='well'>
                                    <h3 class="card-title" ><a href="/nieuwsposts/{{$post->id}}">{{$post->title}}</a></h3>
                                    <p>{!!str_limit($post->content, 300)!!}</p>
                                    <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                                </div>
                            </div>
                            @endforeach
                            <a href="/nieuwsposts">Bekijk alle nieuwsposts ></a>
                       </div>
                
            </div>
        
                <!--Toon 2 nieuwste gebruikers-->
        
            <div class="col-lg-6">
                <a href='/profiles'><h2>Nieuwste gebruikers</h2></a>
                <div class="well" style="box-shadow: 10px 10px 5px #aaaaaa;">
                    @foreach($profiles as $profile)
                        <div class='well'>
                            <a href="/profiles/{{$profile->id}}"><img class="img-circle" width=50px src="{{ route('profile.image', ['filename' => $profile->username . '-' . $profile->user_id . '.jpg']) }}" alt="" class="img-responsive"></a>
                            <h3><a href="/profiles/{{$profile->id}}">{{$profile->username}}</a></h3>
                            <p>{!!str_limit($profile->biography, 300)!!}</p>
                        </div>
                    @endforeach
                    <a href="/profiles">Bekijk alle profielen ></a>
                </div>
            </div>
        
    </div>
    <div class="row">
        
        <!--Communitypost tonen-->
        
        <div class="col-lg-6">
            <a href='/communitypost'><h2>Community</h2></a>
              <div class="well" style="box-shadow: 10px 10px 5px #aaaaaa;">
            @foreach($commpost as $post)
                <div class='well'>
                    <h3><a href="/communitypost/{{$post->id}}">{{$post->title}}</a></h3>
                    <p>{!!str_limit($post->content, 300)!!}</p>
                    <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                </div>
            @endforeach
            <a href="/communitypost">Bekijk alle communityposts ></a>
              </div>
        </div>
        
        <!--Video-->
        
        <div class="col-lg-6">
            <h2>Featured video</h2>
            <div class="well" style="box-shadow: 10px 10px 5px #aaaaaa;">
                <div class="videoWrapper">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/9cKsq14Kfsw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
