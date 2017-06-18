@extends('layouts.masterFahrzeug')



@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Vielen Dank für Ihre Nachricht</h4>
            <strong>Hurra!</strong> {{session('status')}}
        </div>
    @endif

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
        <div class="panel panel-default">
            <div class="panel panel-heading">

                    <a href="/treffpunkt/id/{!! $frage->frage_id !!}"class="question-hyperlink" value="{{$frage->titel}}">{{$frage->titel}}</a>

            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <div class="votes">
                        <div><i class="material-icons">trending_up</i></div>
                    </div>
                    <div class="status unanswered">
                        <div><i class="material-icons">chat</i></div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <div class="votes">
                        @if(is_null($frage->sumValue))
                            <div class="mini-counts">
                                <span title="0 votes">0</span>
                            </div>
                            @else
                            <div class="mini-counts">
                                <span title="0 votes">{{$frage->sumValue}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="status unanswered">
                        @if(is_null($frage->countAntwort))
                            <div class="mini-counts"><span title="0 answers">0</span></div>
                        @else
                            <div class="mini-counts"><span title="0 answers">{{$frage->countAntwort}}</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                    <div>
                        <p class="textPanel">{{$frage->text}}</p>
                    </div>
                    <div class="tags">
                        <p>Themen: </p><a> {{$frage->themen}}</a>
                        <p>Erstellt von: </p> <a>{{$frage->user_name}}</a>
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


@section('content3')
    @isset($themen)
        @foreach($themen as $thema)
            <div>
                @if($thema->bezeichnung===Session::get('thema'))
                    <a href="/treffpunkt/fragen?thema={{$thema->bezeichnung}}" rel="tag" class="tagEvent" value="{{$thema->bezeichnung}}"> <span class="label label-success">{{$thema->bezeichnung}}</span></a>&nbsp;<span
                            class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                                class="item-multiplier-count">{{$thema->total}}</span></span>

                @else
                    <a href="/treffpunkt/fragen?thema={{$thema->bezeichnung}}" rel="tag" class="tagEvent" value="{{$thema->bezeichnung}}"> <span class="label label-default">{{$thema->bezeichnung}}</span></a>&nbsp;<span
                            class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                                class="item-multiplier-count">{{$thema->total}}</span></span>
                @endif
            </div>
        @endforeach
    @endisset
    @endsection