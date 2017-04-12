
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Style Sheet -->
    <style type="text/css">

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            /* Margin bottom by footer height */
            margin-bottom: 60px;
            font-family: "Verdana", "Geneva";
            padding-top: 80px;
        }

        /* die ganze Nav-Bar */
        .navbar-default {
            font-family: "Verdana", "Geneva";
            font-family: sans-serif;
            font-size: 15px;
            font-weight: bold;
            background-color: white;
        }

        /* Position des Bildes */
        .navbar-brand > img {
            max-height: 45px;
            width: auto;
            margin: 0 auto;
            transform: translateX(-50%);
            left: 50%;
            position: absolute;
            padding: 30px;
        }

        /* Der Text innerhalb der Nav-Bar */
        .navbar-default .navbar-nav > li > a {
            color: black;
            font-family: "Verdana", "Geneva";
            font-family: sans-serif;
            padding-top: 25px !important;
            padding-bottom: 25px !important;
            font-size: 18px;
        }

        /* den Text innerhalb der Nav-Bar beim Mauszeiger ändern */
        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            color: #f3c48f;
        }

        .verticalLine {
            border-right: solid #9799a7;
        }

        /* Design der anpassenden Nav-Bar */

        nav.navbar.shrink {
            min-height: 25px;
        }

        nav.navbar.shrink a {
            padding-top: 15px !important;
            padding-bottom: 15px !important;
            font-size: 12px;
            font-weight: normal;
        }

        /* Position des Bildes nach dem Scrollen */
        nav.shrink .navbar-brand > img {
            font-size: 10px;
            max-height: 25px;
        }


        /* Design des Footers */
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 40px;
            background-color:  #9799a7;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer a {
            color: white;
            font-family: "Verdana", "Geneva";
            font-family: sans-serif;
            padding-top: 15px !important;
            padding-bottom: 15px !important;
            font-size: 12px;
        }

        footer a:hover,
        footer a:focus {
            color: cornflowerblue;
            text-decoration: none;
        }

        /* Design der Beschriftung des Eingabefeldes */
        .left {
            text-align: center;
        }

        .form-horizontal .control-label {
            text-align: left;
        }

        .inputHeight {
            height: 200px;
        }

        h2 {
            padding: 20px;
        }


        /* Adobe Farbschema
        #9799a7 grau
        #f3c48f mokka
        #ececf2 silber
        #a8897c braun
        */

    </style>

    <script type="text/javascript">
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('nav').addClass('shrink');
            } else {
                $('nav').removeClass('shrink');
            }
        });
    </script>

</head>

<body>
@section('header')
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a class="verticalLine" href="#">Treffpunkt</a></li>
                <li><a class="verticalLine" href="#">Ersatzteile</a></li>
                <li><a href="#">Experten</a></li>
            </ul>
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Image" src="/Users/floriankaiser/Desktop/Logo.jpg">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="verticalLine" href="#"><span class="glyphicon glyphicon-user"></span> Registrieren</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
</header>
@endsection
</br>
@yield('content')




<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <p><a href="Impressum">Impressum</a></p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <p><a href="Impressum">Kontakt</a></p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <p><a href="Impressum">Über uns</a></p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <p><a href="Impressum">Datenschutz</a></p>
            </div>
        </div>
    </div>
</footer>



</body>
</html>