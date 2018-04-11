@extends('layouts.app')

@section('content')
        

        
        <h1>{{$post->title}}</h1><br>
        @if (Storage::disk('local')->has($post->title . '-' . $user->id . '.jpg'))
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <img src="{{ route('account.image', ['filename' => $post->title . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
                </div>
            </section>
        @endif
        <p>{{$post->content}}</p>
        <small>Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
        
        
@endsection
    
