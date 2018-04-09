@extends('layouts.app')

@section('content')
        <h1>Nieuw profiel aanmaken</h1>
        {!! Form::open(['action' => 'ProfileController@store', 'method' => 'POST']) !!}
            <div class='form-group'>
                

            </div>

        {!! Form::close() !!}
            
@endsection