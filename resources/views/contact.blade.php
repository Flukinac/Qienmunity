@extends('layouts.app')

@section('content')

        <h1>Contact</h1>


        <center>
                <input type="text" class="subject" placeholder="onderwerp" name="contactName"><br><br>
                <textarea rows="10" class="text" cols="50" placeholder="text invoer mail" name="contactText"></textarea><br><br>
                <input type="button" onclick="contactPost()" class="btn btn-primary" value="verzend">
        </center>
            
        <div id="mailSucces"></div>
    </body>
</html>


@endsection

