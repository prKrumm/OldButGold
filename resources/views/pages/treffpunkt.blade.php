@extends('layouts.masterFahrzeug')



@section('content')
    <div class="fragenCon">
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <h2 class="left">Alle Fragen <span class="badge">{{$fragen->total()}}</span></h2>
        </div>
        <div class="col-md-3 col-sm-3">
            <a class="btn btn-default" href="/treffpunkt/create" id="frageKnopf">Frage stellen</a>
        </div>
    </div>


    @foreach($fragen as $frage)
        <div class="detailAntworten">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                    <div>
                        <div class="votes">
                            @if(is_null($frage->sumValue))
                                <div class="mini-counts"><span title="0 votes">0</span></div>
                                @else
                            <div class="mini-counts"><span title="0 votes">{{$frage->sumValue}}</span></div>
                            @endif
                            <div><i class="material-icons">trending_up</i></div>
                        </div>
                        <div class="status unanswered">
                            @if(is_null($frage->countAntwort))
                                <div class="mini-counts"><span title="0 answers">0</span></div>
                            @else
                                <div class="mini-counts"><span title="0 answers">{{$frage->countAntwort}}</span></div>
                            @endif
                            <div><i class="material-icons">chat</i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
                    <div class="summary">
                        <h3><a href="/treffpunkt/id/{!! $frage->frage_id !!}"class="question-hyperlink" value="{{$frage->titel}}">{{$frage->titel}}</a>
                        </h3>
                        <div class="tags">
                            <p>{{$frage->themen}}</p>
                        </div>
                        <div class="user">
                            <p>{{$frage->user_name}}</p>
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
    <a class="btn btn-default" href="/treffpunkt/remove">Fahrzeug wechseln</a>
@endsection