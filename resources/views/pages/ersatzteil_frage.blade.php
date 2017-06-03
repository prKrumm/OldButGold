@extends('layouts.masterFahrzeugFrage')

@section('content')
    <div class="container">
        <h2 class="left">Teil Anfrage</h2>
        <form class="form-horizontal" method="get" action="/ajaxThemenSuche" id="form">
            <div class="col-md-9 col-sm-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Betreff</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="focusedInput" type="text"
                               placeholder="Bitte geben Sie hier Ihren Betreff ein">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <input class="form-control inputHeight" type="text"
                               placeholder="Bitte beschreiben Sie Ihre Frage so genau wie möglich">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ThemenListe" class="col-sm-2 control-label">Themen</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="thema" value="{{$thema or ''}}" autofocus onfocus="this.value = this.value;"
                               autocomplete="on" placeholder="Wählen Sie hier die relevanten Themengebiete" onkeyup="ajaxThema(this.value)"/>
                        <div id="ThemenListe"></div>
                        <input data-role="tagsinput" type="text" class="form-control" placeholder="Themen mit Dropdown. Google-Style!" id="searchname" name="TagName">
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
            function ajaxThema(thema) {
                $("#ThemenListe").html("");
                $.getJSON( "/ajaxThema?thema="+thema, function(data) {
                    $.each(data, function(i,thema) {
                        var link = "<a>"+thema.bezeichnung+"</a><BR>";
                        $(link).appendTo("#ThemenListe");
                    });
                })
            };

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