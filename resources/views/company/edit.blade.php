@extends('layouts.admin')
@section('content')

    <title>Wijzig bedrijfsgegevens</title>

    <!-- ======================== Bedrijfsinvoervelden ------------------------------>

    <div class=container-hours>
        <div class="container">
            <h2>Bedrijfsgegevens</h2>

            <h3><a href="{{ url('/declarations',auth()->user()->id) }}"class='btn btn-default'>terug</a><h3>
                <hr>
                <div class=container-small>
                    <div class="row">
                        {!! Form::open(['action' => ['CompanyController@update', $company->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::label('name', 'Bedrijfsnaam')}}
                            {{Form::text('name', $company->name, ['name' => 'name', 'id' => 'name', 'required' => 'required', 'class' => 'form-control input-sm'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('location', 'Locatie')}}
                            {{Form::text('location', $company->location, ['name' => 'location', 'id' => 'location', 'class' => 'form-control input-sm'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('contact_person', 'Contact persoon')}}
                            {{Form::text('contact_person', $company->contact_person, ['name' => 'contact_person', 'id' => 'contact_person', 'class' => 'form-control input-sm'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::text('email', $company->email, ['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone_number', 'Telefoonnummer')}}
                            {{Form::number('phone_number', $company->phone_number ,['name' => 'phone_number', 'id' => 'phone_number', 'class'=>'form-control'])}}
                        </div>
                        {{Form::submit('updaten', ['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
        </div>
    </div>
@endsection
