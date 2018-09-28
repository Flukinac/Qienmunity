<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>QienMunity</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}" />

   

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" class="general-body">
    <nav class="navbar navbar-default navbar-static-top" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" id="qien--colour">
                    QienMunity  
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (auth()->user())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    <li><a href="{{ url('/profiles') }}">Profielen</a></li>
                    <li><a href="{{ url('/nieuwsposts') }}">Nieuws</a></li>
                    <li><a href="{{ url('/communitypost') }}">Community</a></li>
                    <li><a href="{{ url('/resource') }}">Resource</a></li>
                    {{--<li><a href="{{ url('/events') }}">Events</a></li>--}}
                    <li><a href="{{ url('/contactIndex') }}">Contact</a></li>
                    <li><a href="{{ url('/declarations',auth()->user()->id) }}">Declaraties</a></li>
                </ul>
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"id="qien--colour">Login</a></li>
                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                @if (Storage::disk('local')->has(auth()->user()->name . '-' . auth()->user()->id . '.jpg'))

                                <li><a href="/myprofile"><img class="img-circle" width=30px height=30px src="{{ route('profile.image', ['filename' => auth()->user()->name . '-' . auth()->user()->id . '.jpg']) }}" alt="" class="img-responsive"></a></li>
   
                                @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ auth()->user()->name }} <span class="caret"></span>
                                
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (auth()->user()->rol == 0)
                                <li><a href="{{ url('/register') }}"><i class="fa fa-btn"></i>Nieuwe user aanmaken</a></li>
                                <li><a href="{{ url('/companies/') }}"><i class="fa fa-btn"></i>Nieuw bedrijf aanmaken</a></li>
                                @endif
                                <li><a href="{{ url('/profiles/'.auth()->user()->id) }}"><i class="fa fa-btn"></i>Mijn profiel</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                
                            </ul>
                        </li> 

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="app-layout" class="textbox">

    <div class='container'>

            @include('inc.messages')
            @yield('content')

    </div>
    </div>
    <!-- JavaScripts -->
    <script src="{{URL::asset('js/lib/underscore-min.js')}}"></script>
    <script src="{{URL::asset('js/lib/backbone.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="{{URL::asset('js/index.js')}}"></script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>