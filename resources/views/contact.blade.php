@extends('layouts.app')

@section('content')

        <h1>Contact</h1>


        <center>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="text" class="subject" placeholder="onderwerp" name="contactName">onderwerp<br>
                <textarea rows="10" class="text" cols="50" placeholder="text invoer mail" name="contactText"></textarea>
                <input type="button" onclick="contactPost()" class="contact" value="verzend"><br>
        </center>
            <div style="background-color: red; color: yellow; display: {{$admin}}"  >admin</div>
            <div style="background-color: green; color: yellow; display: {{$docent}}" >docent</div>
            <div style="background-color: blue; color: yellow;" >student</div>
        <div id="mailSucces"></div>
    </body>
</html>


@endsection

