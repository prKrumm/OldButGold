@extends('layouts.masterFahrzeug')

@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <h2>Alle Fragen</h2>
        </div>
        <div class="col-md-3 col-sm-3">
            <a class="btn btn-default" href="ersatzteil/frage">Frage stellen</a>
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
                <h3><a href="/treffpunkt/id/42972375"
                       class="question-hyperlink">Frage zu Einbau eines neuen Motors. Lorem Ipsum.Lorem
                        Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.</a>
                </h3>
                <div class="tags">
                <a href="/treffpunkt" class="post-tag" rel="tag">Motor</a>
                <a href="/treffpunkt" class="post-tag" rel="tag">1,9l</a>
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
                       class="question-hyperlink">Welches Öl für mein Ford Getriebe</a></h3>
                <div class="tags">
                    <a href="/treffpunkt" rel="tag">Getriebe</a>
                    <a href="/treffpunkt" rel="tag">Öl</a>
                </div>
            </div>
        </div>
    </div>
@endsection