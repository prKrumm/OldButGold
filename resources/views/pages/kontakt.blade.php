@extends('layouts.master')

@section('content')
    <div class="container">

        @if ($errors->any())
            <br>
            <div class="alert alert-warning">
                <ul>
                        <li><strong>Info!</strong> Bitte füllen Sie die rot markierten Felder aus.</li>
                </ul>
            </div>
        @endif


        @if(session('status'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4>Vielen Dank für Ihre Nachricht</h4>
                <strong>Hurra!</strong> Wir haben Ihre Nachricht erhalten und werden uns umgehend bei Ihnen melden!
            </div>
        @endif



        <h2 class="left">Kontaktformular</h2>
        <form class="form-horizontal" method="post" action="{{action('StaticController@kontaktformular')}}">
        {{ csrf_field() }}
            <div class="col-md-3">
                <div>
                    <img alt="Image" class="img-thumbnail" src="../images/Frage.jpg">
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="form-group {{ $errors->has('titel') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label">Betreff</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="titel"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" rows="7" name="text"
                                  placeholder="Bitte beschreiben Sie hier Ihr Anliegen"></textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email"
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