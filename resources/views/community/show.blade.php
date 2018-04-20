@extends('layouts.app')

@section('content')
        <h1>{{$post->title}}</h1><br>
        <a href="/communitypost" class="btn btn-default">< Ga terug</a><br/><br/>
        @if (Storage::disk('local')->has($post->title . '-' . $post->user_id . '.jpg'))
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <img src="{{ route('community.image', ['filename' => $post->title . '-' . $post->user_id . '.jpg']) }}" alt="" class="img-responsive">
                </div>
            </section>

            <br>
            <h2>Content</h2>
        @endif
        
        <p>{{$post->content}}</p>
        @if (auth()->user()->id == $post->user_id)
        <a href ='/communitypost/{{$post->id}}/edit' class='btn btn-default'>Bericht bewerken ></a>
        @endif
        @if (auth()->user()->rol == 0||(auth()->user()->id == $post->user_id))
        {!!Form::open(['action' => ['CommunityController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Post verwijderen', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
        <hr>
        <small>Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
        <br>
        
@endsection