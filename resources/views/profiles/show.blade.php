@extends('layouts.app')
@section('content')
    @if (!isset($profile))
        <h1>Geen profiel gevonden!</h1>
        <a href="/" class="btn btn-default">< Terug naar Home</a>
    @else
        <a href="/profiles" class="btn btn-default">Alle profielen</a>

        <br>
        <div id="container-profile">
            <div class="card text-center" id="prof-card" style="width: 50vw;">
                <div class="spacer" id="prof-spacer"></div>
                <br>

                @if (Storage::disk('local')->has($profile->username . '-' . $profile->user_id . '.jpg'))
                    <img class="img-circle profile-img" height="250px" width="250px" src="{{ route('profile.image', ['filename' => $profile->username . '-' . $profile->user_id . '.jpg']) }}" alt="Profiel Foto">
                @endif

                <div class="card-body">
                <h5 class="card-title"><b>{{$profile->username}}</b></h5>
                <hr>
              <p class="card-text"><b>Bio:  <br></b>{{$profile->biography}}</p>
            </div>
            <ul class="list-group">
              <li class="list-group-item profile-list"><b>Geboortedatum: </b>{{$profile->dateofbirth}}</li>
              <li class="list-group-item profile-list"><b>Werkstatus: </b>{{$profile->position}}</li>
              <li class="list-group-item profile-list"><small>Laatst geüpdate op: {{$profile->updated_at}}</small></li>
            </ul>
          </div>
        </div>
    @endif
@endsection


