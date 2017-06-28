@extends('layouts.masterFahrzeugFrage')
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

        <h2 class="left">Frage stellen</h2>
        <form class="form-horizontal" method="post" action="{{action('TreffpunktController@store')}}">
            {{ csrf_field() }}
            <input type="hidden" name="bild_url" value="keinBild">
            <input type="hidden" name="rubrik" value="Frage">
            <div class="col-md-9 col-sm-12">
                <div class="form-group{{ $errors->has('titel') ? ' has-error' : '' }}">
                    <label class="col-md-3 col-sm-3 control-label">Betreff</label>
                    <div class="col-md-9 col-sm-9">
                        <input class="form-control" type="text" name="titel"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                    <label class="col-md-3 col-sm-3 control-label">Beschreibung</label>
                    <div class="col-md-9 col-sm-9">
                        <textarea class="form-control" type="text" name="text" rows="6"
                                  placeholder="Bitte beschreiben Sie Ihre Frage so genau wie möglich"></textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('thema') ? ' has-error' : '' }}">
                    <label class="col-md-3 col-sm-3 control-label">Themen</label>
                    <div class="col-md-9 col-sm-9">
                        @foreach ($themen as $thema)
                            <label class="checkbox-inline">
                                <input type="checkbox" id="ThemenListe" name="thema[]" value="{{$thema->bezeichnung}}">{{$thema->bezeichnung}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3"></label>
                    <div class="col-md-9 col-sm-9">
                        <button type="submit" class="btn btn-default">Frage senden</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <img alt="Image" class="img-thumbnail" src="../images/Frage.jpg">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content2')
    <a class="btn btn-default" href="/treffpunkt/remove">Fahrzeug wechseln</a>
@endsection
