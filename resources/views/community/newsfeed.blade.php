@extends('layouts.app')

@section('content')
        <h1>Community</h1><br>
<a href="/communitypost/create" class="btn btn-default">Nieuw bericht ></a><br/><br/>


        @if(count($nieuws) >= 1)
            @foreach($nieuws as $post)
                <div class='well'>
                    <h3><a href="/communitypost/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>{{$post->content}}</small>

                </div>
            @endforeach
        @else
            <p> No Community Posts Yet</p>
        @endif
        
@endsection