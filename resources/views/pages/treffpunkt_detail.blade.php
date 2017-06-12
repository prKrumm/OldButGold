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
        <!--Hier startet die foreach!!-->
        @foreach($antworten as $antwort)
            <div class="row answer">
                <div class="col-md-2 col-sm-2">
                    <div class="detailBtn">
                        <button type="button" class="btn btn-custom" aria-label="Left Align" href="">
                            <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="detailAntwortenCount">
                        <p>{!!$antwort->votes->sum('value')!!}</p>
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
        <br><br><br><br>

        <h2>Deine Antwort</h2>
    </section>
@endsection

@section('content2')
    <a class="btn btn-default" href="/treffpunkt/remove">Fahrzeug wechseln</a>
@endsection