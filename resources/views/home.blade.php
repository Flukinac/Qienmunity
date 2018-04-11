@extends('layouts.app')

@section('content')
<h1>Home</h1>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
    <div style="background-color: red; color: yellow; display: {{$admin}}"  >admin</div>
    <div style="background-color: green; color: yellow; display: {{$docent}}" >docent</div>
    <div style="background-color: blue; color: yellow;" >student</div>
@endsection

