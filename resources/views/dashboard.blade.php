@extends('layouts.app')

@section('content')

        <h1>Dashboard</h1>
        
        <a href="http://localhost:8000/nieuwegebruiker">Nieuwe gebruiker aanmaken</a><br>
        
        <div style="background-color: red; color: yellow; display: {{$admin}}"  >admin</div>
        <div style="background-color: green; color: yellow; display: {{$docent}}" >docent</div>
        <div style="background-color: blue; color: yellow;" >student</div>
        
    </body>
</html>

@endsection
