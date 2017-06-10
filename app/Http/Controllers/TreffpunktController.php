<?php

namespace App\Http\Controllers;

use App\Http\Model\Antwort;
use App\Http\Model\Vote;
use Illuminate\Http\Request;
use App\Http\Model\Frage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateQuestionRequest;

class TreffpunktController extends ErsatzteilTreffpunktController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fahrzeuge = $this->getFahrzeugList();
        $fragen = $this->showAllQuestions();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.treffpunkt', [
            'fzgModelle' => $fahrzeuge,
            'fzgCount' => $fahrzeuge->count(),
            'fragen' => $fragen
        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.treffpunkt_frage');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        if (Auth::check()) {

            Frage::create($request->all());

            return redirect('treffpunkt');

        } else
            return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fahrzeuge = $this->getFahrzeugList();

        $tmpFrage = Frage::all()->where('frage_id', '=', $id);
        //TODO: hier einen join auf Votes, Antwort mit höchsten Votes zuerst anzeigen
        $tmpAntworten = $this->getAntwortenByVotes($id);
        $tmpIndex = Antwort::all()->where('frage_id', '=', $id)->count();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.treffpunkt_detail', [
            'fzgModelle' => $fahrzeuge,
            'fzgCount' => $fahrzeuge->count(),
            'frage' => $tmpFrage[$id - 1],
            'countAnswers' => $tmpIndex,
            'antworten' => $tmpAntworten,
        ]);
    }

    /**
     * SQL- Select mit Eloquent ausdrücken:
    select antwort.antwort_id, antwort.text, antwort.user_id, antwort.frage_id, sum(vote.value) as summierteVotes
    from vote, antwort
    where vote.antwort_id = antwort.antwort_id
    group by antwort.antwort_id
    order by summierteVotes desc
     *
     *
     * @return JSON
     * @param Antwort.frage_id
     */

    public function getAntwortenByVotes($id){
        $tmpAntwort = Antwort::all()->where('frage_id', '=', $id);
        return $tmpAntwort;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
