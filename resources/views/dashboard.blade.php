@extends('layouts.app')

@section('content')

        <h1>Dashboard</h1>
        
        @if (auth()->user()->rol == 0)
        <a href="http://localhost:8000/nieuwegebruiker">Nieuwe gebruiker aanmaken</a>
        @endif
        <br>
        
        <body>
    </body>
</html>

@endsection
