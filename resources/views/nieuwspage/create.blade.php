@extends('layouts.app')

@section('content')
        <h1>Create Post</h1><br>
<a href="/nieuwsposts" class="btn btn-default">< Ga terug</a><br/><br/>
        
        {!! Form::open(['action' => 'NieuwsController@store', 'method' => 'POST']) !!}
            {{Form::Label('titel')}}
                {{Form::text('titel','',['class'=>'form-control', 'placeholder' => 'Titel'])}}
                <br>
                {{Form::textarea('content','',['class'=>'form-control', 'placeholder' => 'Content'])}}
                {{Form::submit('Submit')}}
        {!! Form::close() !!}

@endsection
    