@extends('layouts.masterFahrzeug')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="left">{!!$frage->titel!!}</h2>
            <p>{!! $frage->text !!}</p>
        </div>
    </div>
    <section class="detailAntworten">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="answer">2 Antworten</h2>
            </div>
        </div>
        <!--Hier startet die foreach!!-->
        <!--foreach($antworten as $antwort)-->
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="detailBtn">
                        <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                            <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="detailAntwortenCount">
                        <p>0</p>
                    </div>
                    <div class="detailBtn">
                        <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                            <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                        </button>
                    </div>

                </div>
                <div class="col-md-10 col-sm-10">
                    <p> Lorem Ipsum
                        <!--{!!$antworten!!}-->
                    </p>
                </div>
            </div>
        <!--endforeach-->
    </section>
@endsection