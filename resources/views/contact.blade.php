@extends('layouts.app')

@section('content')

        <h1>Contact</h1><br>

        <a href="http://localhost:8000/">Home</a><br>
        <a href="http://localhost:8000/profiel">Profiel</a><br>
        <a href="http://localhost:8000/dashboard">Dashboard</a><br>
        <a href="http://localhost:8000/nieuwsposts">Nieuws</a><br>
        <a href="http://localhost:8000/community">Community</a><br>
        <a href="http://localhost:8000/resources">Resources</a><br>

        <center>
            <form action="/contact" method="POST">
                <textarea rows="10" cols="50" name="contactText"> </textarea>
                <input type="submit" class="contact" value="verzend">
            </form>
        </center>
        
    </body>
</html>


@endsection

