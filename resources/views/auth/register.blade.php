<!--ursprünglich {atextends('layouts.app')-->
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3>Registrierung
                </h3>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!--Benutzer-Rolle-->
                            <div class="form-group{{ $errors->has('user-role') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="user-role" class="col-md-4 control-label">Ich bin</label>

                                    <div class="col-md-6">
                                        <input id="user-role" type="text" class="form-control" name="user-role"
                                               value="{{ old('user-role') }}" placeholder="Wähle aus zwischen Händler und Oldtimer-Besitzer" required autofocus>

                                        @if ($errors->has('user-role'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        <!--Name-->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Vorname-->
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="first_name" class="col-md-4 control-label">Vorname</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control" name="first_name"
                                               value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Straße, HausNr.-->
                            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="street" class="col-md-4 control-label">Straße</label>
                                    <div class="col-md-6">
                                        <input id="street" type="text" class="form-control" name="street"
                                               value="{{ old('street') }}" autofocus>

                                        @if ($errors->has('street'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--PLZ, Ort-->
                            <div class="form-group{{ $errors->has('plz') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="plz" class="col-md-4 control-label">PLZ</label>
                                    <div class="col-md-2">
                                        <input id="plz" type="text" class="form-control" name="plz"
                                               value="{{ old('plz') }}" autofocus>

                                        @if ($errors->has('plz'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('plz') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input id="plz" type="text" class="form-control" name="Ort"
                                               value="{{ old('ort') }}" autofocus>

                                        @if ($errors->has('ort'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('ort') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <!--Email-->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Benutzername-->
                            <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="user_name" class="col-md-4 control-label">Benutzername</label>

                                    <div class="col-md-6">
                                        <input id="user_name" type="text" class="form-control" name="user_name"
                                               value="{{ old('user_name') }}" required autofocus>

                                        @if ($errors->has('user_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Passwort-->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="password" class="col-md-4 control-label">gewünschtes Passwort</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Passwort bestätigen-->
                            <div class="form-group">
                                <div class="row">
                                    <label for="password-confirm" class="col-md-4 control-label">Passwort
                                        bestätigen</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-default">
                                            Registrieren
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <img alt="Image" class="img-thumbnail" src="../images/mercedes.jpg">
                </div>
            </div>
        </div>
    </div>
@endsection
