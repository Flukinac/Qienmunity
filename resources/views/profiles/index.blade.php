@extends('layouts.app')
@section('content')
    @if (count($profiles) == 0)
        <h1>Geen profielen gevonden!</h1>
        <a href="/" class="btn btn-default">< Terug naar Home</a>
    @else
        <h1>Profielen</h1>
        <table class="table">
            <thead>
              <tr>
                @if (auth()->user()->rol == 0)
                    <th scope="col">Id</th>
                @endif
                <th scope="col">Naam</th>
                <th scope="col">Geboortedatum</th>
                <th scope="col">Toegevoegd op</th>
              </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <tr class>
                      @if (auth()->user()->rol == 0)
                          <th scope="row">{{$profile->id}}</th>
                      @endif
                      <td><a href='/profiles/{{$profile->user_id}}'>{{$profile->username}}</a></td>
                      <td>{{$profile->dateofbirth}}</td>
                      <td>{{$profile->created_at}}</td>
                      @if (auth()->user()->rol == 0)
                          <td><a href ="/profiles/{{$profile->user_id}}/edit" class="btn btn-sm btn-default">Profiel bewerken ></a></td>
                          <td><a href ="/RemoveUser/{{$profile}}" class="btn btn-sm btn-default">Gebruiker verwijderen ></a></td>
                      @endif
                    </tr>
                @endforeach
                    {{$profiles->links()}}
            </tbody>
        </table>
    @endif
@endsection