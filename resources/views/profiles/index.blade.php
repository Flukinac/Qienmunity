@extends('layouts.app')

@section('content')
        <h1>Profielen</h1>
        @if(count($profiles)>0)
            @foreach($profiles as $profile)
            <div class ='well'>
                <b><a href ="/profiles/{{$profile->id}}"> {{$profile->username}}</a></b>
                <small>Gebruiker sinds {{$profile->created_at}}</small>
            </div>
            @endforeach
            {{$profiles->links()}}
        @else
            <p>Geen profielen gevonden</p>
        @endif
@endsection