<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('title','Home')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{'weatherlogo.png'}}">

    <!--  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/90b90a49ee.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--     <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
    
    <!-- count character in textarea -->
    <script src='https://cdn.jsdelivr.net/npm/vue'></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>

    <style type="text/css">
        /*body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 51%, rgba(9,17,126,1) 53%, rgba(8,34,137,1) 57%, rgba(7,59,153,1) 63%, rgba(6,84,170,1) 69%, rgba(5,101,181,1) 73%, rgba(4,113,189,1) 80%, rgba(0,212,255,1) 100%);
        }*/
        .tablebg{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 51%, rgba(9,17,126,1) 53%, rgba(8,34,137,1) 57%, rgba(7,59,153,1) 63%, rgba(6,84,170,1) 69%, rgba(5,101,181,1) 73%, rgba(4,113,189,1) 80%, rgba(0,212,255,1) 100%);
            color: white;   
        }

        .loginbackground{
            background-color: #FFDEE9;
            background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);


        }
        .sendbg{
            /*background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 51%, rgba(9,17,126,1) 53%, rgba(8,34,137,1) 57%, rgba(7,59,153,1) 63%, rgba(6,84,170,1) 69%, rgba(5,101,181,1) 73%, rgba(4,113,189,1) 80%, rgba(0,212,255,1) 100%);*/
            background-color: #E0A800;    
        }

        .registerbackground{
            background-color: #FFDEE9;
            background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);            
        }

        .verifybackground{
            background-color: #FFDEE9;
            background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);   
        }
        .weather-icon{
            width: 100px;
            height: 100px;
        }

        .image{
            width: 30px;
            height: 35px;
            border-radius: 100%;
        }

    </style>


</head>
<body style="background-color: #F4EAE8">
    <div id="app">
        <!--  -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Welcome Screen') }} -->
                    <img src="weatherlogo.png" style="width: 60px; height: 60px;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                          <a class="nav-link active" href="{{ url('/weather') }}">Weather</a>
                          <a class="nav-link active" href="/user"><i class="fas fa-users"></i> Subscribers</a>
                          <a class="nav-link active" href="/adminlog"><i class="fas fa-toolbox"></i> Admin Logs</a>
                          <a class="nav-link active" href="/post"><i class="fas fa-paste"></i> Post</a>
                          <a class="nav-link active" href="/weatherhistory"><i class="fas fa-history"></i> Weather Histories</a>
                        </nav> -->

                        <a class="navbar-brand" href="{{ url('/weather') }}">Weather</a>
                          <a class="navbar-brand" href="/user"><i class="fas fa-users"></i>Subscribers</a>
                          <a class="navbar-brand" href="/adminlog"><i class="fas fa-toolbox"></i>Admin Logs</a>
                          <a class="navbar-brand" href="/post"><i class="fas fa-paste"></i>Post</a>
                          <a class="navbar-brand" href="/weatherhistory"><i class="fas fa-history"></i>Weather Histories</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-shield"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right active" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/addadmin"><i class="fas fa-user-plus"></i> Add Admin</a>

                                    <a class="dropdown-item" href="/qrcode"><i class="fas fa-qrcode"></i> QRCode</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main style="margin-top: 10px;">
            @yield('content')
        </main>
    </div>

    <script type="text/javascript">
        $('textarea').maxlength({
              alwaysShow: true,
              threshold: 10,
              // warningClass: "label label-success",
              warningClass: "badge badge-warning",
              limitReachedClass: "badge badge-danger",
              separator: '/',
              preText: 'You wrote ',
              postText: ' characters.',
              validate: true
        });
    </script>
</body>
</html>
