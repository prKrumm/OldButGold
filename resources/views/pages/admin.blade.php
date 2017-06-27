@extends('layouts.master')

@section('content')

    <div class="container">
        <h2>Hallo, Admin!</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Posteingang</h4>
            </div>
            <div id="posteingang" class="panel-body">
                <div id="emailList" class="col-md-4">
                    @foreach($emails as $email)
                        <div onclick="mail({{$email->kontaktanfrage_id}});">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <a value="{{$email->titel}}"><strong>{{$email->titel}}</strong></a>
                        </div>
                    @endforeach
                    <?php echo $emails->render(); ?>
                </div>
                <div class="col-md-8">
                    <h4 id="mailTitel"></h4>
                    <p id="mailAbsender"></p>
                    <p id="mailDatum"></p>
                    <article id="mailContent"></article>
                </div>
            </div>
        </div>

        <div class="row border-between">
            <div class="col-md-6 col-lg-6">
                <h2>Alle Fragen</h2>
                @foreach($fragen as $frage)
                    <form class="form-horizontal" method="post" action="{{action('AdminController@edit')}}">
                        <div>
                            <input type="hidden" name="frage_id" value="{{ $frage->frage_id  }}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            <a href="/treffpunkt/id/{!! $frage->frage_id !!}"class="question-hyperlink" value="{{$frage->titel}}">{{$frage->titel}}</a>
                        </div>
                    </form>
                @endforeach
                <?php echo $fragen->render(); ?>
            </div>

            <div class="col-md-6 col-lg-6">
                <h2>Alle Gesuche</h2>
                @foreach($gesuche as $gesuch)
                    <form class="form-horizontal" method="post" action="{{action('AdminController@edit')}}">
                        <div>
                            <input type="hidden" name="frage_id" value="{{ $gesuch->frage_id  }}">
                            {!! csrf_field() !!}
                                <button type="submit" class="btn">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            <a href="/treffpunkt/id/{!! $gesuch->frage_id !!}"class="question-hyperlink" value="{{$gesuch->titel}}">{{$gesuch->titel}}</a>
                        </div>
                    </form>
                @endforeach
                <?php echo $gesuche->render(); ?>
            </div>
        </div>
    </div>

@endsection