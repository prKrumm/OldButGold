@extends('layouts.masterFahrzeug')

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning">
            <p>
                <strong>Speichern der Antwort war leider nicht erfolgreich! Bitte schreiben Sie die Antwort in das
                    Textfeld. </strong>
            </p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="left">{!!$frage->titel!!}</h2>
            <p>{!! $frage->text !!}</p>
        </div>
    </div>
    <section class="detailAntworten">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="answer"> {!!$countAnswers!!}
                    <?php if($countAnswers == 1 ){
                    ?>
                    Antwort
                    <?php }
                    else{ ?>
                    Antworten
                    <?php } ?>
                </h2>
            </div>
        </div>
        <div id="antworten">
            @foreach( $antworten as $antwort)

                <div class="row answer">
                    <div class="col-md-2 col-sm-2">
                        <div class="detailBtn">
                            <button type="button" class="btn btn-custom" aria-label="Left Align" href=""
                                    onclick="upvote($antwort)">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="detailAntwortenCount">
                            <p>
                                <?php
                                if($antwort->value == null) { ?>
                                0
                                <?php }
                                else{
                                ?>
                                {!!$antwort->value!!}
                                    <?php } ?>
                            </p>
                        </div>
                        <div class="detailBtn">
                            <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <p>
                            {!!$antwort->text!!}

                        </p>
                    </div>
                </div>
            @endforeach


        </div>
        <br>

        <h2>Ihre Antwort</h2>
        <form class="form-horizontal" method="post" action="{{action('TreffpunktController@storeTreffpunktAntwort')}}">
            {{ csrf_field() }}
            <input type="hidden" name="frage_id" value="{!! $frage->frage_id !!}">
            <div>
                <div>
                    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                        <textarea class="form-control" name="text" rows="6"
                                  placeholder="Bitte beschreiben Sie Ihre Antwort so genau wie möglich"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-default">Antwort senden</button>
        </form>
    </section>
@endsection

@section('content2')
    <a class="btn btn-default" href="/treffpunkt/remove">Fahrzeug wechseln</a>
@endsection

@section('content3')
    @isset($themen)
        @foreach($themen as $thema)
            <div>
                @if($thema->bezeichnung===Session::get('thema'))
                    <a href="/treffpunkt/fragen?thema={{$thema->bezeichnung}}" rel="tag" class="tagEvent"
                       value="{{$thema->bezeichnung}}"> <span class="label label-success">{{$thema->bezeichnung}}</span></a>
                    &nbsp;<span
                            class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                                class="item-multiplier-count">{{$thema->total}}</span></span>

                @else
                    <a href="/treffpunkt/fragen?thema={{$thema->bezeichnung}}" rel="tag" class="tagEvent"
                       value="{{$thema->bezeichnung}}"> <span class="label label-default">{{$thema->bezeichnung}}</span></a>
                    &nbsp;<span
                            class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                                class="item-multiplier-count">{{$thema->total}}</span></span>
                @endif
            </div>
        @endforeach
    @endisset
@endsection