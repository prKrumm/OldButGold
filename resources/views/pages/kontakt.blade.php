@extends('layouts.master')

@section('content')
    <div class="container">
        <h2 class="left">Kontaktformular</h2>
        <form class="form-horizontal">
            <div class="col-md-3">
                <div>
                    <img alt="Image" class="img-thumbnail" src="../images/Frage.jpg">
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Betreff</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <input class="form-control inputHeight2" type="text"
                               placeholder="Bitte beschreiben Sie hier Ihr Anliegen">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email"
                               placeholder="Bitte geben Sie hier Ihre E-Mail Adresse ein">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-default">Anfrage absenden</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection