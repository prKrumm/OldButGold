@extends('layouts.master')

@section('content')

    <div class="container">
        <h2>Hallo, Admin!</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Posteingang</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-5">
                    @foreach($fragen as $frage)
                        <div onclick="mail({{$frage->frage_id}});">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <a value="{{$frage->titel}}">{{$frage->titel}}</a>
                        </div>
                    @endforeach
                    <?php echo $fragen->render(); ?>
                </div>
                <div class="col-md-7">
                    <h4 id="mailTitel"></h4>
                    <a id="mailContent"></a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function mail (id){
                $("#mailTitel").load("/treffpunkt/id/" + id, {suggest: txt});
            }
        </script>

        <div class="row border-between">
            <div class="col-md-6">
                <h2>Alle Fragen</h2>
                <!--TODO: Add functionality-->
                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Suche Informationen für eine Motobecane n140t  </a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Wie lese ich die Beschriftung auf meinem Reifen? </a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h2>Alle Gesuche</h2>
                <!--TODO: Add functionality-->
                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Ich suche einen Krümmer für Modell A </a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!--Link zur ursprünglichen Gesuche-Seite-->
                        <a> Ich suche einen Krümmer für Modell B</a>
                    </div>
                    <div class="col-md-4">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection