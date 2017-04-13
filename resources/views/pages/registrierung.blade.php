--@extends('layouts.master')
@section('content')


    <div>
        <span>Willkommen bei Old-but-Gold.de - Das Oldtimer Portal</span>
        <hr>
    </div>

    <!--http://stackoverflow.com/questions/18470682/html-form-make-inputs-appear-on-the-same-line#18470972-->
    <div class=container>
        <!--
        -   Registrierungs-Formular: 6-7 columns
        -   Bild: 4 columns
        -->
        <form name="Registrierung">
            <div class="col-md-9 col-md-12">
                <!--User-role-->
                <div class="form-group">
                    <div class="row">
                    <label class="col-md-2 control-label" for="Ich_bin">Ich bin </label>
                    <select class="col-md-10">
                        <option class="form-control " value="Oldtimer-Besitzer">Oldtimer-Besitzer</option>
                        <option class="form-control " value="Oldtimer-Händler">Oldtimer-Händler</option>
                    </select><br>
                </div>
                </div>

                <!--Nachname-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Nachname</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                   placeholder="Nachname"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Vorname-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Vorname</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                   placeholder="Vorname"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Straße,HausNr-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Straße, HausNr.</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text"
                                   placeholder="Straße"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text"
                                   placeholder="HausNr."
                                   required>
                        </div>
                    </div>
                </div>


                <!--PLZ,Ort-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">PLZ, Ort</label>
                        <div class="col-md-3">
                            <input class="form-control" type="text"
                                   placeholder="PLZ"
                                   required>
                        </div>
                        <div class=" col-md-7">
                            <input class="form-control" type="text"
                                   placeholder="Ort"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Email-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email"
                                   placeholder="beispiel@domain.de"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Email repeat-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Email wiederholen</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email"
                                   placeholder="beispiel@domain.de"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Benutzername-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Benutzername</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                   placeholder="Benutzername"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Benutzername repeat-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Benutzername wiederholen</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                   placeholder="Benutzername"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Passwort-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Passwort</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password"
                                   placeholder="Password"
                                   required>
                        </div>
                    </div>
                </div>

                <!--Passwort repeat-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Passwort wiederholen</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password"
                                   placeholder="Password"
                                   required>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection