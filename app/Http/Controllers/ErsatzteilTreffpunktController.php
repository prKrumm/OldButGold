<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.06.2017
 * Time: 15:02
 */

namespace App\Http\Controllers;

use App\Http\Model\Antwort;
use App\Http\Model\Frage;
use App\Http\Model\Hersteller;
use App\Http\Model\Thema;
use App\Http\Model\FzgModell;
use App\Http\Model\Vote;
use App\Http\Requests\CreateAnswerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateQuestionRequest;

class ErsatzteilTreffpunktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ersatzteil');
    }


    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFahrzeugList()
    {
        //Aufbereiten der Daten für die View
        //Fahrzeuge
        return Hersteller::all();
    }


    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFahrzeugListTop()
    {
        //Aufbereiten der Daten für die View
        //Fahrzeuge
        return Hersteller::all()->where('isTopMarke', '==', '1');
    }


    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFahrzeugListRest()
    {
        //Aufbereiten der Daten für die View
        //Fahrzeuge
        return Hersteller::all()->where('isTopMarke', '==', '0');
    }


    /**
     * Holt sich alle Themen und die Anzahl der gestellten Fragen für jedes Thema
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getThemenListWithCount()
    {
        //Aufbereiten der Daten für die View
        //Themen
        $themen = DB::table('thema')
            ->leftJoin('frage_gehoert_thema', 'thema.thema_id', '=', 'frage_gehoert_thema.thema_id')
            ->select('thema.*', DB::raw('count(frage_gehoert_thema.thema_id) as total'))
            ->groupBy('thema.thema_id')->orderBy('total', 'desc')
            ->get();
        return $themen;
    }


    /**
     * Methode holt alle Fragen oder Gesuche aus der DB je nachdem welcher type
     * ausgewählt wurde (ersatzteil; gesuch).
     * Der Übergabeparameter fzg_modell_id schränkt die Fragen auf das jeweilige fzg modell ein.
     * Falls null, dann alle Fragen anzeigen.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllQuestions($type)
    {
        return $this->queryFragenGesuche(null, $type, null);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.ersatzteil_detail');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function fragen(Request $request)
    {
        return $this->queryFragenGesuche(null, $type);
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


    /**
     * Returns all modelle for given hersteller
     *
     * @return \Illuminate\Http\Response
     */
    public function modelle(Request $request)
    {
        $modelle = $this->queryModelle($request);
        return response()->json($modelle);
    }


    private function queryModelle(Request $request)
    {
        $modelle = "hallo";
        if (isset($request->fahrzeug)) {
            $fzg_id = $request->fahrzeug;
        } else {
            $fzg_id = '';
        }
        if ($fzg_id !== '') {
            $modelle = FzgModell::all()->where('hersteller_id', '=', $fzg_id);

        }
        return $modelle;
    }


    protected function queryFragenGesuche($fzg_Modell_id, $type, $thema)
    {
        $paginateCount = 3;
        $whereExtension = array(['test.rubrik', '=', $type]);

        //sql injection vorbeugen
        if ($thema == null) {

        } else {
            array_push($whereExtension, ['test.themen', 'LIKE', "%" . $thema . "%"]);
        }

        if ($fzg_Modell_id == null) {

        } else {
            array_push($whereExtension, ['test.fzg_modell_id', '=', $fzg_Modell_id]);
        }

        $themen = DB::raw("(Select *, Group_CONCAT(DISTINCT thema.bezeichnung) as themen FROM ((frage f Left outer join frage_gehoert_thema t on f.frage_id = t.frage_id) left outer join thema on thema.thema_id = t.thema_id ) group by f.frage_id ) as test");


//                $fragen=DB::table($themen)
//                ->leftJoin('users','users.user_id','=','test.user_id')
//                ->leftJoin('antwort','antwort.frage_id','=','test.frage_id')
//                ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
//                ->where('test.rubrik', '=', $type)
//                ->select('test.*','users.*',DB::raw('sum(vote.value) as sumValue'),DB::raw('count(Distinct antwort.antwort_id) as countAntwort'))
//                ->groupBy('test.frage_id')
//                ->paginate($paginateCount);

        $fragen2 = DB::table($themen)
            ->leftJoin('users', 'users.user_id', '=', 'test.user_id')
            ->leftJoin('antwort', 'antwort.frage_id', '=', 'test.frage_id')
            ->leftJoin('vote', 'vote.antwort_id', '=', 'antwort.antwort_id')
            ->where($whereExtension)
            ->select('test.*', 'users.*', DB::raw('sum(vote.value) as sumValue'), DB::raw('count(Distinct antwort.antwort_id) as countAntwort'))
            ->groupBy('test.frage_id')
            ->paginate($paginateCount);


//
//            $themen=DB::raw("(Select *, Group_CONCAT(DISTINCT thema.bezeichnung) as themen FROM ((frage f Left outer join frage_gehoert_thema t on f.frage_id = t.frage_id) left outer join thema on thema.thema_id = t.thema_id ) group by f.frage_id ) as test");
//
//            $fragen=DB::table($themen)
//                ->leftJoin('users','users.user_id','=','test.user_id')
//                ->leftJoin('antwort','antwort.frage_id','=','test.frage_id')
//                ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
//                ->where('test.rubrik', '=', $type)
//                ->where('test.fzg_modell_id', '=', $fzg_Modell_id)
//                ->select('test.*','users.*',DB::raw('sum(vote.value) as sumValue'),DB::raw('count(Distinct antwort.antwort_id) as countAntwort'))
//                ->groupBy('test.frage_id')
//                ->paginate($paginateCount);
//
//            if($thema!==''){
//                $fragen->where('test.themen', 'LIKE', $thema);
//            }


        return $fragen2;
    }


    // Methode für die Abfrage der relevanten Themen im Fragen-Formular
    public function autocomplete(Request $request)
    {
        if (isset($request->term)) {
            $prefix = $request->term;
        } else {
            $prefix = '';
        }
        if ($prefix !== '') {
            $themen = DB::table('thema')->where('bezeichnung', 'like', $prefix . '%')->orderby('thema_id', 'desc')->get();
        }

        foreach ($themen as $query) {
            $results[] = ['id' => $query->thema_id, 'value' => $query->bezeichnung];
        }
        return response()->json($results);
    }


    public function showAllThemes()
    {
        $themen = DB::table('thema')->select('bezeichnung')->get();
        return $themen;
    }


    public function queryFrageSpeichern($request)
    {
        // Abfragen der fzgId in der Session
        // Abfrage, ob vorhanden nicht notwendig, da FrageStellen erste möglich mit Auswahl eines Fahrzeuges
        $fzg_id = $request->session()->get('fzgId');


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
        foreach ($themen as $thema) {
            $themaId = DB::table('thema')->where('bezeichnung', '=', $thema)->value('thema_id');

            DB::table('frage_gehoert_thema')->insert(
                ['thema_id' => $themaId, 'frage_id' => $frageId]
            );

        }


    }


    public function showDetails($id)
    {
        //hole alle fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest = $this->getFahrzeugListRest();
        //hole die Frage
        $tmpFrage = Frage::getFrageById($id);
        //hole alle passenden Fragen, sortiert nach Votes
        $tmpAntworten = $this->getAntwortenByVotes($id);
        $tmpCountAnsw = Antwort::getCountedAntwortById($id);

        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten
        return [
            'fzgTop' => $fahrzeugeTop,
            'fzgRest' => $fahrzeugeRest,
            'frage' => $tmpFrage,
            'countAnswers' => $tmpCountAnsw,
            'antworten' => $tmpAntworten,
            'themen' => $themen
        ];
    }


    /**
     * @return JSON
     * @param Antwort .frage_id
     */
    public function getAntwortenByVotes($id)
    {
        $data = DB::table('antwort')
            ->select(DB::raw('frage_id, text, sum(vote.value) as value, antwort.antwort_id, vote.user_id'))
            ->where('antwort.frage_id', '=', $id)
            ->leftJoin('vote', 'vote.antwort_id', '=', 'antwort.antwort_id', 'left outer')
            ->groupBy('antwort.antwort_id')
            ->orderBy('value', 'desc')
            ->get();

        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAntwort(CreateAnswerRequest $request)
    {
        $antwort = new Antwort();
        $user_id = Auth::id();

        $antwort->text = $request->text;
        $antwort->frage_id = $request->frage_id;
        $antwort->user_id = $user_id;

        $antwort->save();
    }


    public function storeVotes(Request $request)
    {
        $vote = new Vote();
        $user_id = Auth::id();

        $vote->value = $request->value;
        $vote->antwort_id = $request->antwort_id;
        $vote->user_id = $user_id;

        $vote->save();


        $response = $this->getAntwortenByVotes($request->antwort_id);

        return response()->json($response);
    }
}
