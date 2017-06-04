<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.06.2017
 * Time: 15:02
 */
namespace App\Http\Controllers;

use app\Http\Model\Frage;
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
        return FzgModell::all();
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
    public function frage()
    {
        return view('pages.ersatzteil_frage');
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
            $modelle =FzgModell::all()->where('fzg_modell_id','=',$fzg_id);

        }
        return $modelle;
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
