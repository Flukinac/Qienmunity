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
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="text" class="subject" name="contactName"><br>
                <textarea rows="10" class="text" cols="50" name="contactText"> </textarea>
                <input type="button" onclick="contactPost()" class="contact" value="verzend">
        </center>
        <div id="mailSucces"></div>
    </body>
</html>


@endsection

