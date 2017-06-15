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
        $thema=session()->get('thema');
        //check if fzg in session
        if(session('fzg', false)==true||$thema!=null){
            $fzg_id=session('fzgId', 'default');
            $fragen = $this->queryFragenGesuche($fzg_id,'Gesuch',$thema);
        } else{
            //show all questions
            $fragen =$this->queryFragenGesuche(null,'Gesuch',$thema);
        }
        //hole alle fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest=$this->getFahrzeugListRest();

        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten und Zurückgeben der View
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

            $fragen =$this->queryFragenGesuche($fzg_id,'Gesuch',$thema);

        } else{
            $fragen = $this->queryFragenGesuche(null, 'Gesuch', $thema);
        }
        //hole alle Fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest=$this->getFahrzeugListRest();

        //hole alle Themen
        $themen = $this->getThemenListWithCount();

        //Übergabe der Daten und Zurückgeben der View
        return view('pages.ersatzteil', [
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
        $themen = $this->showAllThemes();
        //falls fahrzeug gewählt, ok sonst redirect
        if(session('fzg')==true) {
            return view('pages.ersatzteil_frage', [
            'themen' => $themen]);
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
            $this->queryFrageSpeichern($request);
            return redirect('ersatzteil')->with('status', 'Sie haben gerade eine Teil-Anfrage an die Community gestellt');

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
        //zeige alle Infos an
        return view('pages.treffpunkt_detail', $this->showDetails($id));
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
        $request->session()->forget('fzg');
        $request->session()->forget('fzgId');
        return redirect()->action('ErsatzteilController@index');
    }
}
