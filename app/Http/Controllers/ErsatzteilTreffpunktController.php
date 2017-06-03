<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 01.06.2017
 * Time: 15:02
 */
namespace App\Http\Controllers;

use App\Http\Model\FzgModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function getIndexList() {
        //Aufbereiten der Daten für die View
        //Fahrzeuge
        $fahrzeuge=FzgModell::all();

        // $fahrzeuge = DB::table('fzg_modell')->get();

        //Übergabne der Daten und Zurückgeben der View
        return view('pages.ersatzteil', [
            'fzgModelle'=> $fahrzeuge,
            'fzgCount'=> $fahrzeuge->count()
        ]);

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
    public function store(Request $request)
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * AJAX
     */

    public function viewTeilAnfrage()
    {
        return view('pages.ersatzteil_frage');
    }

    public function matchJSON(Request $request)
    {
        $themen = $this->queryThema($request);
        return response()->json($themen);
    }

    private function queryThema(Request $request)
    {
        if (isset($request->thema)) {
            $prefix = $request->thema;
        } else {
            $prefix = '';
        }
        if ($prefix !== '') {
            $themen = DB::table('thema')->where('bezeichnung', 'like', $prefix . '%')->orderby('thema_id', 'desc')->get();
        }
        return $themen;
    }



}
