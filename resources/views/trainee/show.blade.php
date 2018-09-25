@extends('layouts.app')
@section('content')
<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Declaration;

$user = Auth::user();
?>

<html>

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="{{ asset('css/tabs_hoursDeclarations.css') }}" rel="stylesheet">
  <link href="{{ asset('css/tabs_declarations.css') }}" rel="stylesheet">
  {{--<link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
  {{--<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">--}}
  <style>
    .tabcontent, .tabcontent2 {
        background-color: white;
        margin-bottom: 50px;
    }
    .form-control  {
        width: 25%;
    }
    th, td {
        padding-right: 20px;
    }
  </style>

  <title>Formulier Trainee</title>

</head>

<header>

</header>
<body>
<!-- ======================== Urenregistratie formulier ------------------------------>

     <div class=container-hours>
      <div class="container">

        <h3>Welkom {{ $user->name }}</h3>


        <h2>Uren Declaraties</h2>
            <fieldset id='form'>
                <input name=amount id=hours type="number" class="form-control" placeholder=' Totaal Uren'>
                <select name=type id="type" class="form-control">
                    <option id=workhours value="workhours"> gewerkte uren</option>
                    <option id=extrahours value="extrahours">overuren</option>
                    <option id=abscense value="abscense">kort verlof</option>
                    <option id=holiday value="holiday">vakantie</option>
                    <option id=sick value="sick">ziek</option>
                    <option id=extra value="extra">overig</option>
                </select>
                <input name=date id=date class="form-control" type="date">
                <textarea name=statement id="statement" rows="1.8" cols="40" class="form-control" placeholder=' Vul hier een beschrijving in'></textarea>

                <br>
                <input type="button" class="btn btn-default" value='Voer in' id="submit" onclick="send()">
                <br>
            </fieldset>

        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'review')" id="defaultOpen">Review</button>
          <button class="tablinks" onclick="openTab(event, 'approved')">Goedgekeurd</button>
          <button class="tablinks" onclick="openTab(event, 'paid')">Betaald</button>
        </div>


        <div id="review" class="tabcontent">
          <table>
                  <tr>
                      <th>Hoeveelheid</th>
                      <th>Type</th>
                      <th>Maand</th>
                      <th>Bedrijf</th>
                      <th>Beschrijving</th>
                      <th>Aangemaakt op</th>
                      <th>Laatste update</th>
                      <th>Wijzigen</th>
                  </tr>
                  @foreach($hours as $hour)
                      @if($hour->status == 0)
                      <tr>
                          <td>{{$hour->amount}}</td>
                          <td>{{$hour->type}}</td>
                          <td>{{$hour->date}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$hour->statement}}</td>
                          <td>{{$hour->created_at}}</td>
                          <td>{{$hour->updated_at}}</td>
                          <td><a href='/trainees/{{$user->id}}/hours_declarations/{{$hour->id}}/edit'class='btn btn-default'>wijzig</a></td>
                      </tr>
                      @endif
                  @endforeach
          </table>
    </div>


        <div id="approved" class="tabcontent">
           <table>
                  <tr>
                      <th>Hoeveelheid</th>
                      <th>Type</th>
                      <th>Maand</th>
                      <th>Bedrijf</th>
                      <th>Beschrijving</th>
                      <th>Aangemaakt op</th>
                      <th>Laatste update</th>
                      <th>Wijzigen</th>
                  </tr>
                  @foreach($hours as $hour)
                      @if($hour->status == 1)
                      <tr>
                          <td>{{$hour->amount}}</td>
                          <td>{{$hour->type}}</td>
                          <td>{{$hour->date}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$hour->statement}}</td>
                          <td>{{$hour->created_at}}</td>
                          <td>{{$hour->updated_at}}</td>
                          <td><a href='/trainees/{{$user->id}}/hours_declarations/{{$hour->id}}/edit'class='btn btn-default'>wijzig</a></td>
                      </tr>
                      @endif
                  @endforeach
          </table>
        </div>

         <div id="paid" class="tabcontent">
          <table>
                  <tr>
                      <th>Hoeveelheid</th>
                      <th>Type</th>
                      <th>Maand</th>
                      <th>Bedrijf</th>
                      <th>Beschrijving</th>
                      <th>Aangemaakt op</th>
                      <th>Laatste update</th>
                      <th>Wijzigen</th>
                  </tr>
                  @foreach($hours as $hour)
                      @if($hour->status == 2)
                      <tr>
                          <td>{{$hour->amount}}</td>
                          <td>{{$hour->type}}</td>
                          <td>{{$hour->date}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$hour->statement}}</td>
                          <td>{{$hour->created_at}}</td>
                          <td>{{$hour->updated_at}}</td>
                          <td><a href='/trainees/{{$user->id}}/hours_declarations/{{$hour->id}}/edit'class='btn btn-default'>wijzig</a></td>
                      </tr>
                      @endif
                  @endforeach
          </table>
        </div>
</div>

      </div>
<!---========================-Declaratie formulier------------------------------>


        <div class=container-declarations>
            <div class="container">
                <style>
                    .form-group{
                        display:inline-block;
                        margin-bottom: 0;
                    }
                    .form{
                        margin-bottom: 15px;
                    }
                </style>
                <h2>Declaraties</h2>

                <div class="form">
                    <?php $id = Auth::user()->id; ?>
                    {!! Form::open(['url' => "/trainees/$id/declarations",'method' => 'POST' , 'enctype' => 'multipart/form-data', 'files' => true ]) !!}

                        <div class="form-group">
                            {{Form::label('date_receipt', ' ')}}
                            {{Form::date('date_receipt', \Carbon\Carbon::now())}}
                        </div>
                        <div class="form-group">
                            {{Form::label('type', ' ')}}
                            {{Form::select('type', [
                                'travelling' => 'reis',
                                'education' => 'Opleiding',
                                'residence' => 'verblijf',
                                'parking' => 'parkeren',
                                'phone' => 'telefoon',
                                'lunch_diner' => 'lunch/diner',
                                'outings' => 'uitjes',
                                'extra' => 'extra'
                            ])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('btw', ' ')}}
                           {{Form::number('btw', 'btw', ['placeholder' => 'btw'])}}
                        </div>
                       <div class="form-group">
                           {{Form::label('total_receipt', ' ')}}
                           {{Form::number('total_receipt', 'total_receipt', ['placeholder' => 'Totaal'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', ' ')}}
                            {{Form::textarea('description', '',['rows' => '1.8','cols' => '30'], ['placeholder' => 'Beschrijving'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('image', ' ')}}
                            {{Form::file('image',['class'=>'btn btn-default'])}}
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
                    {!! Form::close() !!}
                </div>
            <div class="tab2">
              <button class="tablinks2" onclick="openTab2(event, 'review2')" id="defaultOpen2">Review</button>
              <button class="tablinks2" onclick="openTab2(event, 'aproved2')">Goedgekeurd</button>
              <button class="tablinks2" onclick="openTab2(event, 'paid2')">Betaald</button>

            </div>

            <div id="review2" class="tabcontent2">
              <table>
              <tr>
                  <th>Datum bon</th>
                  <th>Type</th>
                  <th>Totaal bon</th>
                  <th>Btw</th>
                  <th>Beschrijving</th>
                  <th>Aangemaakt op</th>
                  <th>Laatste update</th>
              </tr>
              @foreach($declarations as $declaration)
                @if($declaration->status == 0)
                          <tr>
                              <td>{{$declaration->date_receipt}}</td>
                              <td>{{$declaration->type}}</td>
                              <td>{{$declaration->total_receipt}}</td>
                              <td>{{$declaration->btw}}</td>
                              <td>{{$declaration->description}}</td>
                              <td>{{$declaration->created_at}}</td>
                              <td>{{$declaration->updated_at}}</td>
                              <td><a href='/trainees/{{$user->id}}/declarations/{{$declaration->id}}/edit'class='btn btn-default'>wijzig</a></td>
                          </tr>
                @endif
              @endforeach
            </table>
            </div>

            <div id="aproved2" class="tabcontent2">
                            <table>
              <tr>
                  <th>Datum bon</th>
                  <th>Type</th>
                  <th>Totaal bon</th>
                  <th>Btw</th>
                  <th>Beschrijving</th>
                  <th>Aangemaakt op</th>
                  <th>Laatste update</th>
              </tr>
              @foreach($declarations as $declaration)
                @if($declaration->status == 1)
                          <tr>
                              <td>{{$declaration->date_receipt}}</td>
                              <td>{{$declaration->type}}</td>
                              <td>{{$declaration->total_receipt}}</td>
                              <td>{{$declaration->btw}}</td>
                              <td>{{$declaration->description}}</td>
                              <td>{{$declaration->created_at}}</td>
                              <td>{{$declaration->updated_at}}</td>
                              <td><a href='/trainees/{{$user->id}}/declarations/{{$declaration->id}}/edit'class='btn btn-default'>wijzig</a></td>
                          </tr>
                @endif
              @endforeach
            </table>
            </div>

             <div id="paid2" class="tabcontent2">
              <table>
              <tr>
                  <th>Datum bon</th>
                  <th>Type</th>
                  <th>Totaal bon</th>
                  <th>Btw</th>
                  <th>Beschrijving</th>
                  <th>Aangemaakt op</th>
                  <th>Laatste update</th>
              </tr>
              @foreach($declarations as $declaration)
                @if($declaration->status == 2)
                          <tr>
                              <td>{{$declaration->date_receipt}}</td>
                              <td>{{$declaration->type}}</td>
                              <td>{{$declaration->total_receipt}}</td>
                              <td>{{$declaration->btw}}</td>
                              <td>{{$declaration->description}}</td>
                              <td>{{$declaration->created_at}}</td>
                              <td>{{$declaration->updated_at}}</td>
                              <td><a href='/trainees/{{$user->id}}/declarations/{{$declaration->id}}/edit'class='btn btn-default'>wijzig</a></td>
                          </tr>
                @endif
              @endforeach
            </table>
            </div>
          </div>
      </div>
    <script type="text/javascript" src="{{URL::asset('js/form.js')}}"> </script>
    </body>

@endsection
