@extends('layouts.app')

@section('content')

        <h1>Contact</h1>


        <center>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="text" class="subject" placeholder="onderwerp" name="contactName">onderwerp<br>
                <textarea rows="10" class="text" cols="50" placeholder="text invoer mail" name="contactText"></textarea>
                <input type="button" onclick="contactPost()" class="contact" value="verzend"><br>
        </center>
            
        <div id="mailSucces"></div>
    </body>
</html>


@endsection

