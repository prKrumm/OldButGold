@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Hallo, {{ $user->user_name }}!</h2>

        <div class="row border-between">
            <div class="col-md-6">
                <div>
                    <div id="changeSettings">
                        <h3>Profildaten</h3>
                        <p>
                            <input size="31" type="text" value='{!! $adresse->street !!}' id="street" disabled/><br>
                            <input size="31" type="text"
                                   value='{!! $adresse->plz !!}' id="plz"
                                   disabled/><br>
                            <input size="31" type="text" value='{!! $adresse->ort !!}' id="ort"
                                   disabled/>
                        </p>
                        <input size="31" type="text" value='{!! $user->email !!}' id="email" disabled/>
                    </div>
                </div>
                <div class="row">
                    <div class=col-md-6>
                        <a href="profil_aendern" color="white"> <button class="btn btn-default">
                         Profil ändern
                        </button></a>
                    </div>
                    <div class="col-md-6 saveSettings">
                        <button class="btn btn-default " style="display:none">
                            Änderunge speichern
                        </button>
                    </div>
                </div>
            </div>

            <script>

                function changeSettings() {
                    //Input für adresse jetzt editierbar
                    //Button heist nun Änderungen speichern + onclick post request to controller

                    $('#changeSettings')
                    console.log('done')
                }
            </script>


            <div class="col-md-6 ">
                <h3>Aktivität</h3>
                <div class="row">
                    <div class="col-md-8">
                        <p>gestellte Fragen und Gesuche: </p>
                    </div>
                    <div class="col-md-4">
                        <div class="QuesCount-User">
                            <p>{!! $countFrag !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>gegebene Antworten: </p>
                    </div>
                    <div class="col-md-4">
                        <div class="AnswCount-User">
                            <p>{!! $countAntwort !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div tooltip="Ihr Rang hängt ab von den Bewertungen anderer Oldtimer-Liebhaber.
                        Diese bewerten die Güte ihrer gegebenen Antworten.
                        Old-But-Gold bietet folgende Ränge: 'Lehrling', 'Geselle' und 'Meister'">
                            Ranking:
                            <strong>
                                <?php
                                if ($ranking->totalVotes > 19){
                                ?>
                                Meister
                                <?php
                                }else if ($ranking->totalVotes > 9){
                                ?>
                                Geselle
                                <?php }else{
                                ?>
                                Lehrling
                                <?php } ?>
                            </strong>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="AnswCount-User">
                            <p>
                                <!--erster Stern-->
                                <?php
                                if ( $ranking->totalVotes > '4' ){
                                ?>
                                <span class="glyphicon glyphicon-star"> </span>
                                <?php } else{ ?>
                                <span class="glyphicon glyphicon-star-empty"> </span>
                                <?php }?>

                            <!--zweiter Stern-->
                                <?php
                                if ( $ranking->totalVotes > '9' ){
                                ?>
                                <span class="glyphicon glyphicon-star"> </span>
                                <?php } else{ ?>
                                <span class="glyphicon glyphicon-star-empty"> </span>
                                <?php }?>

                            <!--dritter Stern-->
                                <?php
                                if ( $ranking->totalVotes > '19' ){
                                ?>
                                <span class="glyphicon glyphicon-star"> </span>
                                <?php } else{ ?>
                                <span class="glyphicon glyphicon-star-empty"> </span>
                                <?php }?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
            <div class="row border-between">
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-comment"></span>
                    <h3>Meine Fragen</h3>
                    <?php if ($fragen->first() == null) { ?>
                    <span><a href='/treffpunkt/'>Stellen Sie hier Fragen in unserem Treffpunkt</a></span>
                    <?php } else{ ?>
                    @foreach($fragen as $frage)

                        <div>
                            <a href='/treffpunkt/id/{!! $frage->frage_id !!}'>{!! $frage->titel !!} </a>
                        </div>
                    @endforeach
                    <?php } ?>
                </div>


                <div class="col-md-6">
                    <span class="glyphicon glyphicon-wrench"></span>
                    <h3>Meine Gesuche</h3>
                    <?php if ($gesuche->first() == null) { ?>
                    <span><a href='/ersatzteil/'>Stellen Sie hier Gesuche für Ersatzteile ein.</a></span>
                    <?php } else{ ?>
                    @foreach($gesuche as $gesuch)
                        <div>
                            <a href='/ersatzteil/id/{!! $gesuch->frage_id !!}'>{!! $gesuch->titel !!} </a>
                        </div>
                    @endforeach
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@endsection