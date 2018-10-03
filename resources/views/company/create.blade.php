@extends('layouts.admin')
@section('content')

<script>
  // function submit(){                                     Oude manier van data verzenden naar backend
  //   var Company = Backbone.Model.extend({
  //     urlRoot: '/companies'
  //   });
  //
  //   var User = Backbone.Model.extend({
  //     urlRoot: '/register'
  //   });
  //
  //   var company = new Company();
  //
  //   var saveOptions = {
  //     success: function (model, response, options) {
  //       console.log('Succesfully saved company with id: '+response);
  //       var data = new FormData() ;
  //       data.append('first_name', model.attributes.name);
  //       data.append('last_name', model.attributes.contact_person);
  //       data.append('email', model.attributes.email);
  //       data.append('password','tijdelijkwachtwoord');
  //       data.append('password_confirmation','tijdelijkwachtwoord');
  //       data.append('company_id', response);
  //       data.append('employee_number', '');
  //       data.append('role', 3);
  //
  //       $.ajax({
  //         type: "POST",
  //         url: '/register',
  //         data: data,
  //         processData: false,
  //         contentType: false,
  //         success: function(){
  //           console.log('User voor bedrijf opgeslagen');
  //         },
  //         error: function(){
  //           console.log('User aanmaken mislukt');
  //         },
  //       });
  //
  //     },
  //     error: function (model, response, options) {
  //         console.log("Could not save");
  //     }
  //   };
  //
  //   company.save({
  //     name : $('#name').val(),
  //     location : $('#location').val(),
  //     contact_person : $('#contact_person').val(),
  //     email : $('#email').val(),
  //     phone_number : $('#phone_number').val()
  //   }, saveOptions);
  //   window.location.replace("/home");
  // }
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if ($request->name !== '')
                    <h1 style="color: red">Er is iets fout gegaan. Probeer het nog eens.</h1>
                @endif
                <div class="panel-heading">Bedrijf Aanmaken</div>
                <div class="panel-body">
                      {{ csrf_field() }}
                      <div class='form-horizontal'>
                          {!! Form::open(['url' => '/companies', 'enctype' => 'application/x-www-form-urlencoded', 'class' => 'form-group']) !!}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Naam</label>

                            <div class="col-md-6">
                                {{Form::text('name', $request->name, ['class' => 'form-control', 'required' => 'required'])}}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Locatie</label>

                            <div class="col-md-6">
                                {{Form::text('location', $request->location, ['class' => 'form-control', 'required' => 'required'])}}
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Contact persoon</label>

                          <div class="col-md-6">
                              {{Form::text('contact_person', $request->contact_person, ['class' => 'form-control', 'required' => 'required'])}}
                            @if ($errors->has('contact_person'))
                            <span class="help-block">
                              <strong>{{ $errors->first('contact_person') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                           <label for="name" class="col-md-4 control-label">Telefoon nummer</label>

                           <div class="col-md-6">
                               {{Form::text('phone_number', $request->phone_number, ['class' => 'form-control', 'required' => 'required'])}}
                               @if ($errors->has('phone_number'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('phone_number') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                {{Form::text('email', $request->email, ['class' => 'form-control', 'required' => 'required'])}}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{Form::submit('Verstuur', ['class'=>'btn btn-primary'])}}
                                {{--<i class="fa fa-btn fa-user"></i> nog toe te voegen aan submit-button--}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
