@extends('layouts.app')

@section('content')

        <h1>{{$post->title}}</h1><br>
        @if (Storage::disk('local')->has($post->title . '-' . $user->id . '.jpg'))
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <img src="{{ route('community.image', ['filename' => $post->title . '-' . $post->user_id . '.jpg']) }}" alt="" class="img-responsive">
                </div>
            </section>

            <br>
            <h2>Content</h2>
        @endif
        
        <p>{{$post->content}}</p>
        <a href ='/communitypost/{{$post->id}}/edit' class='btn btn-default'>Bericht bewerken ></a>
        <hr>
        <small>@Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
        <br>
        
@endsection