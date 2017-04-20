@extends('layouts.master')

@section('content')

    <div class="container">
        <h2>Hallo, Admin!</h2>
        <hr>
        <div class="row border-between">
            <div class="col-md-6">
                <h2>Alle Fragen</h2>
                <!--TODO: Add functionality-->
                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Suche Informationen für eine Motobecane n140t  </a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Wie lese ich die Beschriftung auf meinem Reifen? </a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h2>Alle Gesuche</h2>
                <!--TODO: Add functionality-->
                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Ich suche einen Krümmer für Modell A </a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Ich suche einen Krümmer für Modell B</a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection