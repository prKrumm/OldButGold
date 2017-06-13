<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.06.2017
 * Time: 15:02
 */
namespace App\Http\Controllers;

use App\Http\Model\Frage;
use App\Http\Model\Hersteller;
use App\Http\Model\Thema;
use App\Http\Model\FzgModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function getFahrzeugList() {
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
    public function getFahrzeugListTop() {
        //Aufbereiten der Daten für die View
        //Fahrzeuge
        return Hersteller::all()->where('isTopMarke','==','1');
    }

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFahrzeugListRest() {
        //Aufbereiten der Daten für die View
        //Fahrzeuge
        return Hersteller::all()->where('isTopMarke','==','0');
    }



    /**
     * Holt sich alle Themen und die Anzahl der gestellten Fragen für jedes Thema
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getThemenListWithCount() {
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
    public function showAllQuestions($type) {
        return $this->queryFragenGesuche(null,$type);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.ersatzteil_detail');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fragen(Request $request)
    {
        return $this->queryFragenGesuche(null,$type);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
        $modelle="hallo";
        if (isset($request->fahrzeug)) {
            $fzg_id = $request->fahrzeug;
        } else {
            $fzg_id = '';
        }
        if ($fzg_id !== '') {
            $modelle =FzgModell::all()->where('hersteller_id','=',$fzg_id);

        }
        return $modelle;
    }

    protected function queryFragenGesuche($fzg_Modell_id,$type)

    {
        $paginateCount=3;
        if($fzg_Modell_id==null){

            //$fragen2=DB::select('Select *, Group_CONCAT(DISTINCT thema.bezeichnung), sum(v.value)as sumValue,count(a.antwort_id) as countAntwort  FROM ((((frage f Left outer join users u on f.user_id = u.user_id)left outer join frage_gehoert_thema t on f.frage_id = t.frage_id) left outer join antwort a on a.frage_id = f.frage_id)left outer join vote v on v.antwort_id = a.antwort_id)left outer join thema on thema.thema_id = t.thema_id  group by (f.frage_id)');


          //  $themen=DB::raw("(Select *, Group_CONCAT(DISTINCT thema.bezeichnung) as themen FROM ((frage f Left outer join frage_gehoert_thema t on f.frage_id = t.frage_id) left outer join thema on thema.thema_id = t.thema_id ) group by f.frage_id ) as test");

//            $fragen2=DB::table('frage')
//                ->select('test.*','users.*',DB::raw('sum(vote.value) as sumValue'),DB::raw('count(Distinct antwort.antwort_id) as countAntwort'))
//                ->leftJoin($themen,function($join){
//                    $join->on('test.frage_id',"=",'frage.frage_id');
//                })
//                ->leftJoin('users','users.user_id','=','frage.user_id')
//                ->leftJoin('antwort','antwort.frage_id','=','test.frage_id')
//                ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
//                ->where('test.rubrik', '=', $type)
//                ->groupBy('frage.frage_id')
//                ->paginate($paginateCount);

              $fragen = DB::table('frage')
                ->leftJoin('users','users.user_id','=','frage.user_id')
                ->leftJoin('frage_gehoert_thema','frage_gehoert_thema.frage_id','=','frage.frage_id')
                ->leftJoin('antwort','antwort.frage_id','=','frage.frage_id')
                ->leftJoin('thema','thema.thema_id','=','frage_gehoert_thema.thema_id')
                  ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
                ->where('frage.rubrik', '=', $type)
                ->select('frage.*','users.*',DB::raw('group_concat(DISTINCT thema.bezeichnung) as themen'),DB::raw('sum(vote.value) as sumValue'),DB::raw('count(DISTINCT antwort.antwort_id) as countAntwort'))
                ->groupBy('frage.frage_id')
                ->paginate($paginateCount);

//                $fragen3=DB::table($themen)
//                ->leftJoin('users','users.user_id','=','test.user_id')
//                ->leftJoin('antwort','antwort.frage_id','=','test.frage_id')
//                ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
//                ->where('test.rubrik', '=', $type)
//                ->select('test.*','users.*',DB::raw('sum(vote.value) as sumValue'),DB::raw('count(Distinct antwort.antwort_id) as countAntwort'))
//                ->groupBy('test.frage_id')
//                ->paginate($paginateCount);


        } else {
           // $fragen2=DB::select('Select *, Group_CONCAT(DISTINCT thema.bezeichnung), sum(v.value)as valueCount,count(a.antwort_id) as antwortCount  FROM ((((frage f Left outer join users u on f.user_id = u.user_id)left outer join frage_gehoert_thema t on f.frage_id = t.frage_id) left outer join antwort a on a.frage_id = f.frage_id)left outer join vote v on v.antwort_id = a.antwort_id)left outer join thema on thema.thema_id = t.thema_id  group by (f.frage_id)');
//            $themen=DB::raw("(Select *, Group_CONCAT(DISTINCT thema.bezeichnung) as themen FROM ((frage f Left outer join frage_gehoert_thema t on f.frage_id = t.frage_id) left outer join thema on thema.thema_id = t.thema_id ) group by f.frage_id ) as test");
//
//            $fragen2=DB::table('frage')
//                ->select('test.*','users.*',DB::raw('sum(vote.value) as sumValue'),DB::raw('count(Distinct antwort.antwort_id) as countAntwort'))
//                ->leftJoin($themen,function($join){
//                    $join->on('test.frage_id',"=",'frage.frage_id');
//                })
//                ->leftJoin('users','users.user_id','=','frage.user_id')
//                ->leftJoin('antwort','antwort.frage_id','=','test.frage_id')
//                ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
//                ->where('test.rubrik', '=', $type)
//                ->groupBy('test.frage_id')
//                ->paginate($paginateCount);
//


            $fragen = DB::table('frage')
                ->leftJoin('users','users.user_id','=','frage.user_id')
                ->leftJoin('frage_gehoert_thema','frage_gehoert_thema.frage_id','=','frage.frage_id')
                ->leftJoin('antwort','antwort.frage_id','=','frage.frage_id')
                ->leftJoin('thema','thema.thema_id','=','frage_gehoert_thema.thema_id')
                ->leftJoin('vote','vote.antwort_id','=','antwort.antwort_id')
                ->where('frage.fzg_modell_id', '=', $fzg_Modell_id)
                ->where('frage.rubrik', '=', $type)
                ->select('frage.*','users.*',DB::raw('group_concat(DISTINCT thema.bezeichnung) as themen'),DB::raw('sum(vote.value) as sumValue'),DB::raw('count(DISTINCT antwort.antwort_id) as countAntwort'))
                ->groupBy('frage.frage_id')
                ->paginate($paginateCount);
        }
        return $fragen;
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

        foreach ($themen as $query)
        {
            $results[] = ['id' => $query->thema_id, 'value' => $query->bezeichnung];
        }
        return response()->json($results);
    }





}
