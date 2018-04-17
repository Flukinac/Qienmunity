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
        @if(count($pinned) >= 1)
            @foreach($pinned as $post)
                <div class='well'>
                    <h3><a href="/nieuwsposts/{{$post->id}}">{{$post->title}}</a></h3>
                    <div><h4>{{str_limit($post->content, 50)}}</h4></div><br>
                    <div><h5>Gepost op: {{$post->created_at}}</h5></div>
                    @if (auth()->user()->rol == 0||(auth()->user()->id == $post->id))
                        <a href ="/nieuwsposts/{{$post->id}}/edit" class="btn btn-primary" > Wijzig Nieuwspost</a>
                        {!!Form::open(['action' => ['NieuwsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}  
                    @endif
                </div>              
            
            @endforeach
        @else
            <p> Geen Pinned Posts</p>
        @endif
        <hr>
        <hr>
        
        @if(count($nieuws) >= 1)
            @foreach($nieuws as $post)
                <div class='well'>
                    <h3><a href="/nieuwsposts/{{$post->id}}">{{$post->title}}</a></h3>
                    <div><h4>{{str_limit($post->content, 50)}}</h4></div><br>
                    <div><h5>Gepost op: {{$post->created_at}}</h5></div>
                    @if (auth()->user()->rol == 0||(auth()->user()->id == $post->id))
                        <a href ="/nieuwsposts/{{$post->id}}/edit" class="btn btn-default" > Wijzig Nieuwspost</a>
                        
                        {!!Form::open(['action' => ['NieuwsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}  
                        
                    @endif
                    @if (auth()->user()->rol == 0)
                        {!!Form::open(['route' => ['nieuws.bookmark', $post->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('bookmark', ['class' => 'btn btn-primary'])}}
                        {!!Form::close()!!}  
                    @endif
                </div>              
            
            @endforeach
            {{$nieuws->links()}}
        @else
            <p> Geen Nieuws Posts</p>
        @endif
            
@endsection