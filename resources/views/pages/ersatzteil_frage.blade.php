@extends('layouts.masterFahrzeugFrage')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors-> all() as $error)
                        <li><strong>Info!</strong> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="left">Teil Anfrage</h2>
        <form class="form-horizontal" method="post" action="{{action('ErsatzteilController@store')}}">
            {{ csrf_field() }}
            <div class="col-md-9 col-sm-12">
                <div class="form-group{{ $errors->has('titel') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label">Betreff</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="focusedInput" type="text" name="titel"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <input class="form-control inputHeight" type="text" name="text"
                               placeholder="Bitte beschreiben Sie Ihre Frage so genau wie möglich">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('thema') ? ' has-error' : '' }}">
                    <label for="ThemenListe" class="col-sm-2 control-label">Themen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               placeholder="Wählen Sie hier die relevanten Themengebiete" id="ThemenListe" name="thema">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('bild_url') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label">Bild</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="focusedInput" type="text" name="bild_url"
                               placeholder="Bitte Bild hinzufügen">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
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
    <script type="text/javascript">
        $('#ThemenListe').autocomplete({
            source:'{!!URL::route('autocomplete')!!}',
            minlength:1,
            autoFocus:true,
            select:function(e,ui)
            {
                $('#ThemenListe').val(ui.item.value);
            }
        });
    </script>
@endsection

@section('content2')
    <a class="btn btn-default" href="/ersatzteil/remove">Fahrzeug wechseln</a>
@endsection