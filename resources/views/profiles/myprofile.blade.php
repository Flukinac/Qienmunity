@extends('layouts.app')

@section('content')
<h1>Mijn profiel</h1>
        <h2> {{Auth::user()->profile->username}}</h2>
        <ul>
            @if (Storage::disk('local')->has(auth()->user()->name . '-' . auth()->user()->id . '.jpg'))
            <li><img width=250px src="{{ route('profile.image', ['filename' => auth()->user()->name . '-' . auth()->user()->id . '.jpg']) }}" alt="" class="img-responsive"></li>
            @endif
            <li><b>Geboortedatum: </b>{{Auth::user()->profile->dateofbirth}}</li>
            <li><b>Werkstatus: </b>{{Auth::user()->profile->position}}</li>
            <li><b>Bio: </b>{{Auth::user()->profile->biography}}</li>
            <li><b>E-mail: </b>{{Auth::user()->profile->email}}</li>
        </ul>
        <a href ="/profiles/{{Auth::user()->profile->id}}/edit" class="btn btn-default">Profiel bewerken ></a>
        <hr/>
        <small>Laatst geüpdate op: {{$profile->updated_at}}</small>
@endsection