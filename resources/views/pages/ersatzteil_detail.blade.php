@extends('layouts.masterFahrzeug')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="left">Frage zu Einbau eines neuen Motors</h2>
            <p>Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="answer">2 Antworten</h2>
        </div>
    </div>
    <section class="detailAntworten">
    <div class="row">

            <div class="col-md-2 col-sm-2">
                <div class="detailBtn">
                    <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                        <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="detailAntwortenCount">
                    <p>3</p>
                </div>
                <div class="detailBtn">
                    <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                    </button>
                </div>
                <!--
                    <a class="btn btn-default" href="">Up</a>
                    <a class="btn btn-default" href="">Down</a>
                -->
            </div>
            <div class="col-md-10 col-sm-10">
                <p>Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,</p>
            </div>

    </div>
    </section>
    <section class="detailAntworten">
    <div class="row">
        <section>
            <div class="col-md-2 col-sm-2">
                <div class="detailBtn">
                    <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                        <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="detailAntwortenCount">
                    -2
                </div>
                <div class="detailBtn">
                    <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                    </button>
                </div>

            </div>
            <div class="col-md-10 col-sm-10">
                <p>Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,
                    Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,</p>
            </div>
    </div>
    </section>
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