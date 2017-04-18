@extends('layouts.masterFahrzeug')

@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <h2>Alle Gesuche</h2>
        </div>
        <div class="col-md-3 col-sm-3">
            <a class="btn btn-default" href="ersatzteil/frage">Teil anfragen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-2">
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
        <div class="col-md-9 col-sm-10">
            <div class="summary">

                <h3><a href="/ersatzteil/id/42972375"
                       class="question-hyperlink">Suche Krümmer für meinen P2. Lorem Ipsum.Lorem
                        Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.</a>
                </h3>
                <div class="tags">
                    <a href="/ersatzteil" rel="tag">Motor</a>
                    <a href="/ersatzteil" rel="tag">1,9l</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-2">
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
        <div class="col-md-9 col-sm-10">
            <div class="summary">
                <h3><a href="/ersatzteil/id/42972375"
                       class="question-hyperlink">Suche Vergaser für Opel Blitz</a></h3>
                <div class="tags">
                    <a href="/ersatzteil" rel="tag">Vergaser</a>
                    <a href="/ersatzteil" rel="tag">Öl</a>
                </div>
            </div>
        </div>
    </div>




@endsection