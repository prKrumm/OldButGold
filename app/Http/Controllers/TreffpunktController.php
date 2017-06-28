<?php

namespace App\Http\Controllers;

use App\Http\Model\Antwort;
use App\Http\Model\FzgModell;
use App\Http\Model\Hersteller;
use App\Http\Model\Vote;
use App\Http\Requests\CreateAnswerRequest;
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
        $thema = session()->get('thema');
        session()->forget('search');

        //check if fzg in session
        if (session('fzg', false) == true) {
            $fzg_id = session('fzgId', 'default');
            $fragen = $this->queryFragenGesuche($fzg_id, 'Frage', $thema,null);
        } else {
            //show all questions
            $fragen = $this->queryFragenGesuche(null, 'Frage', $thema,null);
        }
        //hole alle Fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest = $this->getFahrzeugListRest();
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function fragen(Request $request)
    {
        $fahrzeuge = $this->getFahrzeugList();

        if (isset($request->modell)) {
            $fzg_id = $request->modell;
        } else {
            $fzg_id = $request->session()->get('fzgId');
        }
        if (isset($request->thema)) {
            $thema = $request->thema;
            if ($request->session()->get('thema') == $thema) {
                $request->session()->forget('thema');
                $thema = null;
            } else {
                $request->session()->put('thema', $thema);
            }
        } else {
            $thema = $request->session()->get('thema');
        }
        if(isset($request->Search)){
            $searchString=$request->Search;
            $request->session()->put('search', $searchString);
        } else {
            $searchString=$request->session()->get('search');
        }

        if ($fzg_id !== '' && $fzg_id !== null) {
            $currentModell = FzgModell::getFzgById($fzg_id);
            $currentFahrzeug = Hersteller::getFzgById($currentModell->hersteller_id);
            $request->session()->put('fzgId', $fzg_id);
            $request->session()->put('fzg', true);
            $request->session()->put('fzgName', $currentFahrzeug->marke);
            $request->session()->put('fzgModell', $currentModell->modell);

            $fragen = $this->queryFragenGesuche($fzg_id, 'Frage', $thema,$searchString);

        } else {
            $fragen = $this->queryFragenGesuche(null, 'Frage', $thema,$searchString);
        }
        //hole alle Fahrzeuge
        $fahrzeugeTop = $this->getFahrzeugListTop();
        $fahrzeugeRest = $this->getFahrzeugListRest();
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
        $themen = $this->showAllThemes();
        //falls fahrzeug gewählt, ok sonst redirect
        if (session('fzg') == true) {
            return view('pages.treffpunkt_frage', [
                'themen' => $themen]);
        } else {
            return redirect()->action('TreffpunktController@index');
        }
    }

    public function storeTreffpunktAntwort(CreateAnswerRequest $request)
    {

        if (Auth::check()) {
            $this->storeAntwort($request);
            return redirect('treffpunkt')->with('status', 'Sie haben gerade eine Antwort auf eine Community-Frage gegeben.');

        } else
            return view('auth.login');
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
            $this->queryFrageSpeichern($request);
            return redirect('treffpunkt')->with('status', 'Sie haben gerade eine Frage an die Community gestellt');

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
        //zeige alle Infos an
        return view('pages.treffpunkt_detail', $this->showDetails($id));
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
