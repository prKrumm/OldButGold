@extends('layouts.master')

@section('content')


    <div class="container">
        <div class="row">
            <h2>Hallo {{ $user->user_name }}!</h2>
            <div class="panel-heading">
                <h2 class="left">Ändern Sie hier Ihre Profildaten</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <!--Straße, HausNr.-->
                            <div class="registerPanel form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="street" class="col-md-4 control-label">Straße</label>
                                    <div class="col-md-6">
                                        <input id="street" type="text" class="form-control" name="street"
                                               value="{!! $adresse->street !!}">
                                        @if ($errors->has('street'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--PLZ, Ort-->
                            <div class=" registerPanel form-group{{ $errors->has('plz') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="plz" class="col-md-4 control-label">PLZ</label>
                                    <div class="col-md-2">
                                        <input id="plz" type="text" class="form-control" name="plz"
                                               value="{{ $adresse->plz }}">

                                        @if ($errors->has('plz'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('plz') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input id="ort" type="text" class="form-control" name="ort"
                                               value="{{$adresse->ort }}">

                                        @if ($errors->has('ort'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('ort') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Email-->
                            <div class=" registerPanel form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ $user->email }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row col-md-7">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default">
                            Profil ändern
                        </button>
                    </div>

                    <div class="col-md-6">
                        <a href="/profil">
                            <button class="btn btn-default">
                                Zurück
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection