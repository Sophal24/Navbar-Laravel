<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome Dashboard</title>
        <!-- <title>@yield('title','Home')</title> -->


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/90b90a49ee.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            body{
                background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 51%, rgba(9,17,126,1) 53%, rgba(8,34,137,1) 57%, rgba(7,59,153,1) 63%, rgba(6,84,170,1) 69%, rgba(5,101,181,1) 73%, rgba(4,113,189,1) 80%, rgba(0,212,255,1) 95%);
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color: white;"><i class="fas fa-home"></i> Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color: white;"><i class="fas fa-sign-in-alt"></i> Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color: white;"><i class="fas fa-user-circle"></i> Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

                <a class="navbar-brand" href="{{ url('/home') }}">
                    <!-- {{ config('app.name', 'Welcome Screen') }} -->
                    <img src="weatherlogo.png" style="width: 250px; height: 250px;" class="weatherlogo">
                </a>
                <div class="title m-b-md" style="color: white;">
                    Dashboard
                </div>
                <div class="title m-b-md">
                    <a href="/home"><i class="fas fa-arrow-alt-circle-right"></i></a>
                    
                </div>
            </div>
        </div>
    </body>
</html>
