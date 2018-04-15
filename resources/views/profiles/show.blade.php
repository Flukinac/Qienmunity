@extends('layouts.app')

@section('content')
        <a href="/profiles" class="btn btn-default">< Terug naar alle profielen</a>
        <h1> {{$profile->username}} </h1>
        <ul>
            <li><img src ='{{$profile->image}}' height="250px"></li>
            <li><b>Geboortedatum: </b>{{$profile->dateofbirth}}</li>
            <li><b>Werkstatus: </b>{{$profile->position}}</li>
            <li><b>Bio: </b>{{$profile->biography}}</li>
            <li><b>E-mail: </b>{{$profile->email}}</li>
        </ul>
        <hr/>
        <small>Laatst geüpdate op: {{$profile->updated_at}}</small>
@endsection