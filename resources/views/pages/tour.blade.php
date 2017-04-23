@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="text-center">
            <h1> Tour</h1>
            <span>Willkommen auf dem Oldtimer - Portal</span>
            <hr>
        </div>
        <h2 class="center">Stellen Sie Fragen und erhalten Sie Antworten</h2>
        <br>
        <div class="row">
            <div class="col-md-8">

                <p>Das Portal ermöglicht Besitzern Fragen an die Community zu stellen. Mitglieder des Portals
                    beantworten diese Fragen. Die Besonderheit von OldButGold liegt darin, dass die gegebenen
                    Ratschläge und
                    Antworten bewertet werden. So finden Sie qualifizierte Antworten auf einen Blick, dies erspart den Interessenten
                    im besten Fall ein mühseeliges Durchblättern der Antworten.</p>
            </div>
            <div class="col-md-4">
                <img alt="Image" class="img-thumbnail" src="../images/Cadillac.jpg">
            </div>
        </div>
        <div class="row">
            <h2 class="center">Stellen Sie Gesuche für Ersatzteile ein </h2>
            <div class="col-md-8">
                <p>Sie können Suchaufträge für seltene bzw. schwer zu beschaffende Ersatzteile einstellen. Jedes
                    Gesuch muss sich dabei immer auf ein bestimmtes Fahrzeug-Modell beziehen. Die Suche erreicht alle
                    dort registrierten Händler, welche auf die entsprechende Marke und Modell spezialisiert sind.
                    Diese können wiederum gezielt auf die Oldtimer-Besitzer zugehen und Ihre Produkte verkaufen.
                </p>
            </div>
            <div class="col-md-4 ">
                <img alt="Image" class="img-thumbnail" src="../images/ersatzteile.jpg">
            </div>
        </div>

        <div class="row">
            <h2 class="center">Finden Sie Experten in ihrer Nähe auf einen Blick</h2>
            <div class="col-md-8">
                <p>
                    Experten können sich bei OldButGold registrieren, um an Diskussionen teilnehmen zu können. Bei der
                    Registrierung vermerkt der Experte optional seine Adresse. Dadurch willigt der Experte ein, dass
                    OldButGold in der Rubrik "Experten" dessen Standort mit Hilfe des Dienstes GoolgeMaps darstellt.
                    Dadurch finden Interessenten auf einen Blick, welche Experten in nächster Nähe erreichbar sind.
                </p>

            </div>
            <div class="col-md-4 ">
                <img alt="Image" class="img-thumbnail" src="../images/werkstatt.jpg">
            </div>
        </div>
    </div>
@endsection