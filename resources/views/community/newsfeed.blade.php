@extends('layouts.app')

@section('content')
        <h1>Community</h1><br>
        <input id="zoek" type="text" name='search' onkeyup="zoekenComm()" data-token="{{ csrf_token() }}" data-link="{{ url('/zoek') }}" class="form-control" placeholder="zoek">
            
<a href="/communitypost/create" class="btn btn-default">Nieuw bericht ></a><br/><br/>


        @if(count($nieuws) >= 1)
            @foreach($nieuws as $post)
                <div class='well'>
                    <h3><a href="/communitypost/{{$post->id}}">{{$post->title}}</a></h3>
        @if (auth()->user()->rol == 0||(auth()->user()->id == $post->user_id))
            {!!Form::open(['action' => ['CommunityController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Post verwijderen', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
        <p>{!!str_limit($post->content, 300)!!}</p>
        <small>Geschreven op {{$post->updated_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>

                </div>
            @endforeach
        @else
            <p> No Community Posts Yet</p>
        @endif
        {{ $nieuws->links() }}

@endsection