@extends('layouts.masterFahrzeug')



@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <h2 class="left">Alle Fragen</h2>
        </div>
        <div class="col-md-3 col-sm-3">
            <a class="btn btn-default" href="treffpunkt/create" id="frageKnopf">Frage stellen</a>
        </div>
    </div>
    <div class="fragenCon">

    @foreach($fragen as $frage)
        <div class="detailAntworten">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                    <div>
                        <div class="votes">
                            <div class="mini-counts"><span title="0 votes">0</span></div>
                            <div><i class="material-icons">trending_up</i></div>
                        </div>
                        <div class="status unanswered">
                            <div class="mini-counts"><span title="0 answers">0</span></div>
                            <div><i class="material-icons">chat</i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
                    <div class="summary">
                        <h3><a href="/treffpunkt/id/3"class="question-hyperlink" value="{{$frage->text}}">{{$frage->text}}</a>
                        </h3>
                        <div class="tags">
                            <a href="/treffpunkt" rel="tag">Motor</a>
                            <a href="/treffpunkt" rel="tag">1,9l</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <?php echo $fragen->render(); ?>
    </div>
@endsection

@section('content2')
    <a class="btn btn-default" href="treffpunkt/remove">Fahrzeug wechseln</a>
@endsection