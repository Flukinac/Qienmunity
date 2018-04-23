@extends('layouts.app')

@section('content')
        <h1>Community: {{$post->title}}</h1><br>
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
        
        <p>{!!$post->content!!}</p>
        <small>Geschreven op {{$post->created_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small><br>
        @if (auth()->user()->id == $post->user_id)
        <a href ='/communitypost/{{$post->id}}/edit' class='btn btn-default'>Bericht bewerken ></a>
        @endif
        @if (auth()->user()->rol == 0||(auth()->user()->id == $post->user_id))
        {!!Form::open(['action' => ['CommunityController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Post verwijderen', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
        
        <h2>Comments</h2>
        
        <div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				<div class="comment">
					<p>{{$comment->content}}</p>
                                        
                                            @if (auth()->user()->rol == 0||(auth()->user()->id == $comment->user_id))
                                                {{Form::open(['route' => ['communitycomment.destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-right']) }}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Comment verwijderen', ['class' => 'btn btn-danger pull-right'])}}
                                                {{Form::close()}}  
                                            @endif   
                                        
                                            <small>Geschreven door <a href='/profiles/{{$comment->user->profile->id}}'>{{$comment->user->name}}</a></small>
                                        <hr>
				</div>
			@endforeach
		</div>
	</div>
        
        
        {{ Form::open(['route' => ['communitycomment.store', $post->id], 'method' => 'POST']) }}

        <div class="row">
                <div class="col-md-12">
                        {{ Form::label('comments', "Comment:") }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;']) }}
                </div>
        </div>

        {{ Form::close() }}
        <hr>
        <br>
        
@endsection