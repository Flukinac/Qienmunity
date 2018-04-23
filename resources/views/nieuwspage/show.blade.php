@extends('layouts.app')

@section('content')
    <a href="/nieuwsposts" class="btn btn-default">< Ga terug</a><br/><br/>
        <div class="row">
            @if (Storage::disk('local')->has($post->title . '' . $post->user_id . 'news.jpg'))
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <img src="{{route('news.image', ['filename' => $post->image]) }}" alt="" class="img-responsive">
                </div>
            </section>

            <br>
            <h2>Content</h2>
        @endif
            <div class="col-md-10 col-md-offset-1">
                <div class="card" id="showNewsPost">
                    
                    <div class="card-header" id="qien--background-colour">
                        <h3>Nieuws: {{$post->title}}</h3>
                    </div>
                    <div class="card-body">
                      
                      <p class="card-text-nieuws" id="card-text-nieuws">{!!$post->content!!}</p>
                      <small>Geschreven op {{$post->created_at}} door <a href='/profiles/{{$post->user->profile->id}}'>{{$post->user->name}}</a></small>
                    </div>
                  </div>
            </div>
	</div>

    <h2>Comments</h2>
    
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

                    
                                <small>Geschreven door <a href='/profiles/{{$comment->user->profile->id}}'>{{$comment->user->name}}</a></small>
                                        <hr>
				</div>
			
		</div>
	</div>
        @endforeach

        <div class="row">

            <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                    {{ Form::open(['route' => ['nieuwscomment.store', $post->id], 'method' => 'POST']) }}


                        <div class="row">
                                <div class="col-md-12">
                                        {{ Form::label('comments', "Comment:") }}
                                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;']) }}
                                </div>
                        </div>

                    {{ Form::close() }}

            </div>
        </div>
      


        </div>



@endsection