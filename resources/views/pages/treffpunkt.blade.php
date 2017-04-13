<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>OldButGold</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/question.css') }}" rel="stylesheet">

    <script type="text/javascript">
        $(window).scroll(function () {
            if ($(document).scrollTop() > 50) {
                $('nav').addClass('shrink');
            } else {
                $('nav').removeClass('shrink');
            }
        });
    </script>

</head>

<body>

<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div>
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a class="verticalLine" href="#">Treffpunkt</a></li>
                    <li><a class="verticalLine" href="#">Ersatzteile</a></li>
                    <li><a href="#">Experten</a></li>
                </ul>

                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img class="image-responsive" alt="Responsive image" src="../images/Logo.jpg">
                    </a>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>
                                Login</a></li>
                        <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span>
                                Registrieren</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <h2 class="left">Frage stellen</h2>
        <form class="form-horizontal">
            <div class="col-md-9 col-sm-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Betreff</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="focusedInput" type="text"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <input class="form-control inputHeight" type="text"
                               placeholder="Bitte beschreiben Sie Ihre Frage so genau wie möglich">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Themen</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"
                               placeholder="Wählen Sie hier die relevanten die Themengebiete">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-default">Frage senden</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img alt="Image" class="img-thumbnail" src="../images/Frage.jpg">
            </div>
        </form>
    </div>

    <div class="container">
        <div class="col-md-9">
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
        </div>

        <div class="col-md-3">
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <p><a href="Impressum">Impressum</a></p>
            </div>

            <div class="col-md-3 col-sm-6">
                <p><a href="Kontakt">Kontakt</a></p>
            </div>

            <div class="col-md-3 col-sm-6">
                <p><a href="UeberUns">Über uns</a></p>
            </div>

            <div class="col-md-3 col-sm-6">
                <p><a href="Datenschutz">Datenschutz</a></p>
            </div>
        </div>
    </div>
</footer>



</body>
</html>