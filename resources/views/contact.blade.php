@extends('layouts.app')

@section('content')

        <h1>Contact</h1>


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

