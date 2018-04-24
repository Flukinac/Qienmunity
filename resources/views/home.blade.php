@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>
<p>Welkom, {{auth()->user()->name}}</p>


<div class="container">
    <div class="row">
        
        <!--Nieuwposts tonen-->
        
                <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="qien--background-colour"><h2><a href='/nieuwsposts'>Nieuws</a></h2></div>
                    <div class="panel-body">
                        @foreach($nieuwspost as $post)
                            <div class='well'>
                                <h3><a href="/nieuwsposts/{{$post->id}}">{{$post->title}}</a></h3>
                                <p>{!!str_limit($post->content, 300)!!}</p>
                                <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                            </div>
                        @endforeach
                    </div> 
            </div>
        </div>
        
        <!--Communitypost tonen-->
        
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="qien--background-colour"><h2><a href='/communitypost'>Community</a></h2></div>
                    <div class="panel-body">
                        @foreach($commpost as $post)
                            <div class='well'>
                                <h3><a href="/communitypost/{{$post->id}}">{{$post->title}}</a></h3>
                                <p>{!!str_limit($post->content, 300)!!}</p>
                                <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                            </div>
                        @endforeach
                    </div> 
            </div>
        </div>
        
        <!--Video-->
        
        <div class="col-md-10 col-md-offset-1">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/u9Mv98Gr5pY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        
        
    </div>
</div>

@endsection
