@extends('layouts.app')

@section('content')

        <h1>Contact</h1>

<form>
  <div class="form-group" id="mailSucces">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="text" class="form-control" id="subject" placeholder="Onderwerp" name="contactName">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="contactText" placeholder="Text Invoer Mail"></textarea>
  </div>
    <input type="button" onclick="contactPost()" class="btn btn-primary" value="Verzend">
</form>


@endsection

