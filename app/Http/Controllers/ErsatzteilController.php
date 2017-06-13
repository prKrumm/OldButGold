<?php

namespace App\Http\Controllers;

use App\Http\Model\FzgModell;
use App\Http\Model\Hersteller;
use App\Http\Model\Frage;
use App\Http\Requests\CreateQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ErsatzteilController extends ErsatzteilTreffpunktController
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if fzg in session
        if(session('fzg', false)==true){
            $fzg_id=session('fzgId', 'default');
            $fragen = $this->queryFragenGesuche($fzg_id,'ersatzteil');
        } else{
            //show all questions
            $fragen = $this->showAllQuestions('ersatzteil');
        }
        //hole alle fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest=$this->getFahrzeugListRest();

        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabne der Daten und Zurückgeben der View
        return view('pages.ersatzteil', [
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
        if ($fzg_id !== '') {
            $currentModell = FzgModell::getFzgById($fzg_id);
            $currentFahrzeug = Hersteller::getFzgById($currentModell->hersteller_id);

            $request->session()->put('fzgId',$fzg_id);
            $request->session()->put('fzg',true);
            $request->session()->put('fzgName',$currentFahrzeug->marke);
            $request->session()->put('fzgModell',$currentModell->modell);

            $fragen =$this->queryFragenGesuche($fzg_id,'ersatzteil');

        }
        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.ersatzteil', [
            'fzgModelle' => $fahrzeuge,
            'fzgCount' => $fahrzeuge->count(),
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
    {   //falls fahrzeug gewählt, ok sonst redirect
        if(session('fzg')==true) {
            return view('pages.ersatzteil_frage');
        } else{
            return redirect()->action('ErsatzteilController@index');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        if (Auth::check()) {

            Frage::create($request->all());

            return redirect('ersatzteil');

        } else
            return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fahrzeuge=$this->getFahrzeugList();

        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabne der Daten und Zurückgeben der View

        return view('pages.treffpunkt_detail', [
            'fzgModelle'=> $fahrzeuge,
            'fzgCount'=> $fahrzeuge->count(),
            'themen' => $themen]);


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

    // Entfernt ausgewähltes Fahrzeug
    public function remove(Request $request)
    {
        $request->session()->put('fzg');
        return redirect()->action('ErsatzteilController@index');
    }
}
