@extends('layouts.app')

@section('content')
 
           
        <h1>Nieuws</h1>
            <div class='well'>
            @if (auth()->user()->rol == 0)
                <a href="/nieuwsposts/create" class="btn btn-default">Nieuw bericht ></a>
            @endif
            
            <input id="zoek" type="text" name='search' onkeyup="zoeken()" data-token="{{ csrf_token() }}" data-link="{{ url('/zoek') }}" class="form-control" placeholder="zoek">
            
            </div>
            <br/>
        
        @if(!empty($postquery) && count($postquery) >= 1)
            @foreach($postquery as $post)
                
                    <h3><a href="/nieuwsposts/{{$post->id}}" id="qien--colour">{{$post->title}}</a></h3>
                    <h4>{{str_limit($post->content, 50)}}</h4><br>
                    <h5>Gepost op: {{$post->created_at}}</h5>
                
            @endforeach
        @else
                <h2>Gepind Nieuws</h2>   

            @if(count($pinned) >= 1)

            <div class="card-group">

                    @foreach($pinned as $post)
                            <div class="card">

                            <img class="card-img-top" src="{{ URL::asset('css/images/qien-color.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                  <h3 class="card-title" id="qien--colour">{{$post->title}}</h3>
                                  <p class="card-text">{{$post->content}}</p>
                                  <p class="card-text"><small class="text-muted">Gepost op: {{$post->created_at}}</small></p>
                                  <a href="/nieuwsposts/{{$post->id}}" class="btn btn-default">Lees Verder</a>

                                  @if(auth()->user()->rol == 0)
                                        <hr>    
                                        {!! Form::open(['action' => ['NieuwsController@update', $post->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'PUT')}}
                                            {{Form::hidden('unpin', 'unpin')}}
                                            {{Form::submit('Unpin', ['class' => 'btn btn-default'])}}
                                        {!!Form::close()!!}  

                                    @endif

                                    @if (auth()->user()->rol == 0||(auth()->user()->id == $post->id))
                                        <hr>
                                        <a href ="/nieuwsposts/{{$post->id}}/edit" class="btn btn-sm btn-primary"> Wijzig Nieuwspost</a>
                                        {!!Form::open(['action' => ['NieuwsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btnbtn-sm btn-danger'])}}
                                        {!!Form::close()!!}  
                                    @endif
                                </div>
                            </div>


                    @endforeach
                </div>


            @else
                <p> Geen Pinned Posts</p>
            @endif


            <hr>

            <h2>Nieuws Posts</h2>
            <div class="testdiv1"></div> 
            <div class="testdiv2"></div> 
            <div class="testdiv3"></div> 

            @if(count($nieuws) >= 1)
                @foreach($nieuws as $post)
                    <div class='well'>
                        <h3><a href="/nieuwsposts/{{$post->id}}" id="qien--colour">{{$post->title}}</a></h3>
                        <div><h4>{{str_limit($post->content, 50)}}</h4></div><br>
                        <div><h5>Gepost op: {{$post->created_at}}</h5></div>

                        @if (auth()->user()->rol == 0)
                        <hr>
                            {!! Form::open(['action' => ['NieuwsController@update', $post->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::hidden('pinned', 'pinned')}}
                                {{Form::submit('Pin', ['class' => 'btn btn-primary'])}}
                            {!!Form::close()!!}  
                        @endif

                        @if (auth()->user()->rol == 0||(auth()->user()->id == $post->id))
                        <hr>
                            <a href ="/nieuwsposts/{{$post->id}}/edit" class="btn btn-default" > Wijzig Nieuwspost</a>

                            {!!Form::open(['action' => ['NieuwsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}  

                        @endif

                    </div>              

                @endforeach

            @else
                <p> Geen Nieuws Posts</p>
            @endif
        @endif    
@endsection