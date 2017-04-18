@extends('layouts.master')

@section('content')
    <div class="container">
        <!--TODO: Add functionality get-Username-->
        <h2>Hallo, Hubert53!</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h3>Profildaten</h3>
                <address>
                    Hauptstraße 10 <br>
                    78478 Konstanz
                </address>
                <p>hubert53@t-online.de</p>
                <br>
                <h3>Themen</h3>
                <!--TODO: add functionality-->
                <span>lackieren, restaurieren</span>
                <hr>
                <button type="submit" class="btn btn-default">
                    Profil ändern
                </button>
            </div>
            <div class="col-md-6">
                <h3>Aktivität</h3>
                <div class="row">
                    <div class="col-md-8">
                        <p>gestellte Fragen: </p>
                    </div>
                    <div class="col-md-4">
                        <div class="QuesCount-User">
                            <output>17</output>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>beantwortete Fragen: </p>
                    </div>
                    <div class="col-md-4">
                        <div class="AnswCount-User">
                            <output>200</output>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>Ranking: </p>
                    </div>
                    <div class="col-md-4">
                        <div class="AnswCount-User">
                            <output>
                                <span class="glyphicon glyphicon-star"> </span>
                                <span class="glyphicon glyphicon-star"> </span>
                                <span class="glyphicon glyphicon-star-empty"> </span>
                            </output>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Meine Gesuche</h3>
            </div>
        </div>
    </div>
@endsection