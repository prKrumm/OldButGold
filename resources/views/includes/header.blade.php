<nav class="navbar navbar-default navbar-fixed-top">
    <div class="topheader">
        OldButGold.de - Ihr Portal für Oldtimer!
    </div>
    <div class="container-fluid">
        <!-- Definiert den Button mit dem eingeklappten Menü-->
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <!-- <span class="button-label">Menu</span> -->
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="/">
                <img class="image-responsive" alt="OldButGold" src="/images/LogoRot.jpg">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="anchor"><a class="anchor" href="/treffpunkt">Treffpunkt</a></li>
                <li class="anchor"><a class="anchor" href="/ersatzteil">Ersatzteile</a></li>
                <li class="anchor"><a class="anchor" href="/experten">Experten</a></li>
            </ul>

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
                            {{ Auth::user()->user_name }} <span class="caret"></span>
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
                            <li><a href="/profil">Profil</a></li>

                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
