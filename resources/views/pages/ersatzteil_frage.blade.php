@extends('layouts.masterFahrzeugFrage')

@section('content')
    <div class="container">
        <h2 class="left">Teil Anfrage</h2>
        <form class="form-horizontal" method="post" action="{{action('ErsatzteilController@store')}}">
            {{ csrf_field() }}
            <div class="col-md-9 col-sm-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Betreff</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="focusedInput" type="text" name="titel"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <input class="form-control inputHeight" type="text" name="text"
                               placeholder="Bitte beschreiben Sie Ihre Frage so genau wie möglich">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ThemenListe" class="col-sm-2 control-label">Themen</label>
                    <div class="col-sm-10">
                        <input data-role="tagsinput" type="text" class="form-control"
                               placeholder="Wählen Sie hier die relevanten Themengebiete" id="searchname" name="thema">
                    </div>
                </div>
                <div class="form-group">
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

        <script type="text/javascript">
            $('#searchname').autocomplete({
                source:'{!!URL::route('autocomplete')!!}',
                minlength:1,
                autoFocus:true,
                select:function(e,ui)
                {
                    $('#searchname').val(ui.item.value);
                }
            });
        </script>
    </div>
@endsection