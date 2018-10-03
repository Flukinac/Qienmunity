@extends('layouts.app')

@section('content')



        <h1>Contact</h1>
        <h4>Heb je vragen, opmerkingen of tips voor het QienMunity platform?</h4>
        <p>Neem via onderstaand formulier contact op met Paul Veen van Qien. Je wordt dan zo spoedig mogelijk teruggemaild.</p>

{!! Form::open(array('url' => '/contactMail', 'enctype' => 'application/x-www-form-urlencoded')) !!}
    <div class="form-group">
        <label for="exampleFormControlInput1">Onderwerp</label><br>
        {{Form::label('subject', ' ')}}
        {{Form::text('subject', $request->subject, ['class' => 'form-group', 'width' => 100])}}
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Jouw bericht</label><br>
        {{Form::label('text', ' ')}}
        {{Form::textarea('text', $request->text, ['class' => 'form-group', 'rows' => 5, 'cols' => 100])}}
    </div>
    {{Form::submit('verzenden',['class' => 'btn btn-default'])}}
{!! Form::close() !!}


@endsection