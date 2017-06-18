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
        <div class="col-md-9 col-sm-8">
            <h2 class="left">Alle Gesuche  <span class="badge">{{$fragen->total()}}</span></h2>
        </div>
        <div class="col-md-3 col-sm-4">
            <a class="btn btn-default" href="/ersatzteil/create" id="frageKnopf"><span class="glyphicon glyphicon-wrench"></span> Teil anfragen</a>
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
                    <h3><a href="/ersatzteil/id/{{ $frage->frage_id }}"class="question-hyperlink"value="{{$frage->titel}}">{{$frage->titel}}</a>
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
    <a class="btn btn-default" href="/ersatzteil/remove">Fahrzeug wechseln</a>
@endsection

@section('content3')
    @isset($themen)
        @foreach($themen as $thema)
            <div>
                @if($thema->bezeichnung===Session::get('thema'))
                    <a href="/ersatzteil/fragen?thema={{$thema->bezeichnung}}" rel="tag" class="tagEvent" value="{{$thema->bezeichnung}}"> <span class="label label-success">{{$thema->bezeichnung}}</span></a>&nbsp;<span
                            class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                                class="item-multiplier-count">{{$thema->total}}</span></span>

                @else
                    <a href="/ersatzteil/fragen?thema={{$thema->bezeichnung}}" rel="tag" class="tagEvent" value="{{$thema->bezeichnung}}"> <span class="label label-default">{{$thema->bezeichnung}}</span></a>&nbsp;<span
                            class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                                class="item-multiplier-count">{{$thema->total}}</span></span>
                @endif
            </div>
        @endforeach
    @endisset
@endsection