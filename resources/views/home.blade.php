@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="qien--background-colour">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
    @if (auth()->user()->rol <= 0)
    <div style="background-color: red; color: yellow;"  >admin</div>
    @endif
    @if (auth()->user()->rol <= 1)
    <div style="background-color: green; color: yellow;" >docent</div>
    @endif
    <div style="background-color: blue; color: yellow;" >student</div>
@endsection
