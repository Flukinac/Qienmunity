@extends('layouts.app')

@section('content')
        <a href="/profiles" class="btn btn-default">< Terug naar alle profielen</a>
        <h1> {{$profile->username}} </h1>
        <ul>
            @if (Storage::disk('local')->has($profile->username . '-' . $user->id . '.jpg'))
                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3">
                        <li><img src="{{ route('profile.image', ['filename' => $profile->username . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive"></li>
                    </div>
                </section>
                <br>
            @endif
            <li><b>Geboortedatum: </b>{{$profile->dateofbirth}}</li>
            <li><b>Werkstatus: </b>{{$profile->position}}</li>
            <li><b>Bio: </b>{{$profile->biography}}</li>
            <li><b>E-mail: </b>{{$profile->email}}</li>
        </ul>
        <a href ="/profiles/{{$profile->id}}/edit" class="btn btn-default">Profiel bewerken ></a>
        <hr/>
        <small>Laatst geüpdate op: {{$profile->updated_at}}</small>
@endsection