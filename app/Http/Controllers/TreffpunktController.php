<?php

namespace App\Http\Controllers;

use App\Http\Model\Antwort;
use App\Http\Model\FzgModell;
use App\Http\Model\Hersteller;
use App\Http\Model\Vote;
use Illuminate\Http\Request;
use App\Http\Model\Frage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $thema=session()->get('thema');
        //check if fzg in session
        if(session('fzg', false)==true){
            $fzg_id=session('fzgId', 'default');
            $fragen = $this->queryFragenGesuche($fzg_id,'Frage',$thema);
        } else{
            //show all questions
            $fragen =$this->queryFragenGesuche(null,'Frage',$thema);
        }
        //hole alle Fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest=$this->getFahrzeugListRest();
        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.treffpunkt', [
            'fzgTop' => $fahrzeugeTop,
            'fzgRest' => $fahrzeugeRest,
            'fragen' => $fragen,
            'themen' => $themen
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fragen(Request $request)
    {
        $fahrzeuge = $this->getFahrzeugList();

        if (isset($request->modell)) {
            $fzg_id = $request->modell;
        } else {
            $fzg_id=$request->session()->get('fzgId');
        }
        if (isset($request->thema)) {
            $thema = $request->thema;
            if($request->session()->get('thema')== $thema){
                $request->session()->forget('thema');
                $thema=null;
            } else {
                $request->session()->put('thema', $thema);
            }
        } else {
            $thema=$request->session()->get('thema');
        }

        if ($fzg_id !== ''&&$fzg_id !==null) {
            $currentModell = FzgModell::getFzgById($fzg_id);
            $currentFahrzeug = Hersteller::getFzgById($currentModell->hersteller_id);
            $request->session()->put('fzgId',$fzg_id);
            $request->session()->put('fzg',true);
            $request->session()->put('fzgName',$currentFahrzeug->marke);
            $request->session()->put('fzgModell',$currentModell->modell);

            $fragen =$this->queryFragenGesuche($fzg_id,'Frage',$thema);

        } else {
            $fragen = $this->queryFragenGesuche(null, 'Frage', $thema);
        }
        //hole alle Fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest=$this->getFahrzeugListRest();
        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.treffpunkt', [
            'fzgTop' => $fahrzeugeTop,
            'fzgRest' => $fahrzeugeRest,
            'fragen' => $fragen,
            'themen' => $themen
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //falls fahrzeug gewählt, ok sonst redirect
        if(session('fzg')==true) {
            return view('pages.treffpunkt_frage');
        } else{
            return redirect()->action('TreffpunktController@index');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        // Abfragen der fzgId in der Session
        // Abfrage, ob vorhanden nicht notwendig, da FrageStellen erste möglich mit Auswahl eines Fahrzeuges
        $fzg_id = $request->session()->get('fzgId');

        if (Auth::check()) {

            // User ID abfragen und eine neue Frage erstellen
            $user_id = Auth::id();
            $frage = new Frage;

            // Daten aus dem Formular (zum Teil mit hidden-inputfields)
            $frage->titel = $request->titel;
            $frage->text = $request->text;
            $frage->bild_url = $request->bild_url;
            $frage->rubrik = $request->rubrik;
            $frage->fzg_modell_id = $fzg_id;
            $frage->user_id = $user_id;

            $frage->save();
            // ID der gerade angelegten Frage abfragen
            $frageId = $frage->frage_id;

            // Array mit den Themen erzeugen
            $themen = $request->thema;

            // Abfrage der IDs aus der DB
            $themaId = DB::table('thema')->where('bezeichnung', '=', $themen)->value('thema_id');

            DB::table('frage_gehoert_thema')->insert(
                ['thema_id' => $themaId, 'frage_id' => $frageId]
            );


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
        //hole alle fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest=$this->getFahrzeugListRest();

        $tmpFrage = Frage::all()->where('frage_id', '=', $id);
        //TODO: hier einen join auf Votes, Antwort mit höchsten Votes zuerst anzeigen
        $tmpAntworten = $this->getAntwortenByVotes($id);
        $tmpIndex = Antwort::all()->where('frage_id', '=', $id)->count();
        //$tmpVote = Vote::all()->where('antwort_id','3')->get();

        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.treffpunkt_detail', [
            'fzgTop' => $fahrzeugeTop,
            'fzgRest' => $fahrzeugeRest,
            'frage' => $tmpFrage[$id - 1],
            'countAnswers' => $tmpIndex,
            'antworten' => $tmpAntworten,
            'themen' => $themen
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

    // Entfernt ausgewähltes Fahrzeug
    public function remove(Request $request)
    {
        $request->session()->put('fzg');
        $request->session()->forget('fzg');
        $request->session()->forget('fzgId');

        return redirect()->action('TreffpunktController@index');
    }
}
