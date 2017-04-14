<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div>
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a class="verticalLine" href="/treffpunkt">Treffpunkt</a></li>
                <li><a class="verticalLine" href="/ersatzteil">Ersatzteile</a></li>
                <li><a href="/experten">Experten</a></li>
            </ul>

 <!--           <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img class="image-responsive" alt="Responsive image" src="../images/Logo.jpg">
                </a>
            </div>
-->
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}" class="verticalLine"><span class="glyphicon glyphicon-log-in"></span>
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