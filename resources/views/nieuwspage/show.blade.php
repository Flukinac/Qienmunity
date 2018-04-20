@extends('layouts.app')

@section('content')

        
<a href="/nieuwsposts" class="btn btn-default">Ga terug</a><br/><br/>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card" id="showNewsPost">
                    <div class="card-header" id="qien--background-colour">
                        <h3>{{$post->title}}</h3>
                    </div>
                    <div class="card-body">
                      
                      <p class="card-text-nieuws" id="card-text-nieuws">{{$post->content}}</p>
                      <small>Geschreven op {{$post->created_at}} door {{$post->user->name}}</small>
                    </div>
                  </div>
            </div>
	</div>
        <div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				<div class="comment">
					<p>{{$comment->content}}</p>

                                @if (auth()->user()->rol == 0||(auth()->user()->id == $comment->user_id))
                                    {{ Form::open(['route' => ['nieuwscomment.destroy', $comment->id], 'method' => 'POST']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete comment', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}}  
                                @endif
                    
                                        <small>Geschreven door {{$comment->user->name}}</small>
                                        <hr>
				</div>
			@endforeach
		</div>
	</div>
        <div class="row">

        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                {{ Form::open(['route' => ['nieuwscomment.store', $post->id], 'method' => 'POST']) }}

                        <div class="row">
                                <div class="col-md-12">
                                        {{ Form::label('comments', "Comment:") }}
                                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                                </div>
                        </div>

                {{ Form::close() }}

        </div>


@endsection