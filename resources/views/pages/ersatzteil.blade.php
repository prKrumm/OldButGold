@extends('layouts.masterFahrzeug')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <h2>Alle Gesuche</h2>
            </div>
            <div class="col-md-3 col-sm-3">
                <a class="btn btn-default" href="ersatzteil/frage">Teil anfragen</a>
            </div>
        </div>
    </div>
    </div>


    <div id="qlist-wrapper">
        <div class="container">
            <div class="col-md-3 col-sm-3">
                <div class="question-summary narrow"
                     id="question-summary-42972375">

                    <div class="votes">
                        <div class="mini-counts"><span title="0 votes">0</span></div>
                        <div>votes</div>
                    </div>

                    <div class="status unanswered">
                        <div class="mini-counts"><span title="0 answers">0</span></div>
                        <div>answers</div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="summary">

                    <h3><a href="/ersatzteil/id/42972375"
                           class="question-hyperlink">Parse integer and show in timeline in Kibana</a></h3>
                    <div class="tags t-kibana t-kibana-5">
                        <a href="/questions/tagged/kibana" class="post-tag"
                           title="show questions tagged &#39;kibana&#39;" rel="tag">kibana</a> <a
                                href="/questions/tagged/kibana-5" class="post-tag"
                                title="show questions tagged &#39;kibana-5&#39;" rel="tag">kibana-5</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection