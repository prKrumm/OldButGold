@extends('layouts.masterOLD')

@section('content')


    <div class="container">
        <h2 class="left">Frage stellen</h2>
        <form class="form-horizontal">
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
                    <label class="col-sm-2 control-label">Themen</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"
                               placeholder="Wählen Sie hier die relevanten die Themengebiete">
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
                <img alt="Image" class="img-thumbnail" src="../images/Frage.jpg">
            </div>
        </form>
    </div>

    <div class="container">
        <div class="col-md-9">
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
        </div>

        <div class="col-md-3">
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
            <div>
                <p> Lorem IPSUM</p>
            </div>
        </div>
    </div>


@endsection