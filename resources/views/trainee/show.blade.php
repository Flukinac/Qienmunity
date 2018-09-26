@extends('layouts.app')
@section('content')
<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Declaration;

$user = Auth::user();
$id = $user->id;
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
    th, td {
        padding-right: 20px;
    }
    .form-group{
        display:inline-block;
        margin-bottom: 0;
    }
    .form{
        margin-bottom: 15px;
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

        <div class="form">
            {!! Form::open (['url' => "/trainees/$id/hours_declarations", 'method' => 'POST' ,'enctype' => 'multipart/form-data', 'class' => 'form-groupss'])!!}
              <div>
                  {{Form::label('Totaal Uren', ' ')}}
                  {{Form::number('hours', 'hours',['placeholder' => 'Totaal aantal uren', 'class' => 'form-group', 'required' => 'required'])}}
              </div>
              <div>
                  {{Form::label('type', ' ')}}
                  {{Form::select('type',
                    ['workhours' => 'gewerkte uren',
                    'extrahours' => 'extra uren',
                    'abscense' => 'kort verlof',
                    'holiday' => 'vakantie',
                    'sick' => 'ziek',
                    'extra' => 'overig'
                    ], ['class' => 'form-group'])
                  }}
              </div>
              <div>
                  {{Form::label('Datum', ' ')}}
                  {{Form::date('date', 'date', ['class' => 'form-group', 'required' => 'required'])}}
              </div>
              <div>
                  {{Form::label('Beschrijving', ' ')}}
                  {{Form::textarea('statement', ' ', ['rows' => '1.8','cols' => '30'], ['placeholder' => ' Vul hier een beschrijving in', 'class' => 'form-group'])}}
              </div>
              {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
            {!! Form::close() !!}
        </div>

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
                    {!! Form::open(['url' => "/trainees/$id/declarations",'method' => 'POST' , 'enctype' => 'multipart/form-data', 'files' => true, 'class' => 'form-group']) !!}
                        <div >
                            {{Form::label('date_receipt', ' ')}}
                            {{Form::date('date_receipt', \Carbon\Carbon::now(), ['class' => 'form-group', 'required' => 'required'])}}
                        </div>
                        <div>
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
                        <div>
                           {{Form::label('btw', ' ')}}
                           {{Form::number('btw', 'btw', ['placeholder' => 'btw', 'class' => 'form-group'])}}
                        </div>
                        <div>
                           {{Form::label('total_receipt', ' ')}}
                           {{Form::number('total_receipt', 'total_receipt', ['placeholder' => 'Totaal', 'required' => 'required', 'class' => 'form-group'])}}
                        </div>
                        <div>
                            {{Form::label('description', ' ')}}
                            {{Form::textarea('description', '',['rows' => '1.8','cols' => '30'], ['placeholder' => 'Beschrijving', 'class' => 'form-group'])}}
                        </div>
                        <div>
                            {{Form::label('image', ' ')}}
                            {{Form::file('image',['class' => 'btn btn-default'])}}
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
