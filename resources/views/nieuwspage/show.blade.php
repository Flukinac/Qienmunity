@extends('layouts.app')

@section('content')
    <a href="/nieuwsposts" class="btn btn-default">< Ga terug</a><br/><br/>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card" id="showNewsPost">
                    <div class="card-header" id="qien--background-colour">
                        <h3>Nieuws: {{$post->title}}</h3>
                    </div>
                    <div class="card-body">
                      
                      <p class="card-text-nieuws" id="card-text-nieuws">{{$post->content}}</p>
                      <small>Geschreven op {{$post->created_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                    </div>
                  </div>
            </div>
	</div>
       
	
        @foreach($post->comments as $comment)
         <div class="well">
                        <div class="accordion" id="accordion">

                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{$comment->user->name}}
                                    
                                  </button>
                                </h5>
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                  <p>{{$comment->content}}</p>
                                </div>
                              
                      
                                @if (auth()->user()->rol == 0||(auth()->user()->id == $comment->user_id))
                                    {{ Form::open(['route' => ['nieuwscomment.destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Comment verwijderen', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}}  
                                @endif
<<<<<<< HEAD
                                <hr>
                                    <small>Geschreven door {{$comment->user->name}}</small>
                                    
                              </div>

                        </div>
         </div>
        @endforeach
		
	
=======
                    
                                <small>Geschreven door <a href='/profiles/{{$comment->user->profile->id}}'>{{$comment->user->name}}</a></small>
                                        <hr>
				</div>
			@endforeach
		</div>
	</div>
>>>>>>> test
        <div class="row">

            <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                    {{ Form::open(['route' => ['nieuwscomment.store', $post->id], 'method' => 'POST']) }}

<<<<<<< HEAD
                            <div class="row">
                                    <div class="col-md-12">
                                            {{ Form::label('comments', "Comment:") }}
                                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                                            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                                    </div>
                            </div>
=======
                        <div class="row">
                                <div class="col-md-12">
                                        {{ Form::label('comments', "Comment:") }}
                                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;']) }}
                                </div>
                        </div>
>>>>>>> test

                    {{ Form::close() }}

            </div>
        </div>


@endsection