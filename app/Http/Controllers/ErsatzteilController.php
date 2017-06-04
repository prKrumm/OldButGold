<?php

namespace App\Http\Controllers;

use App\Http\Model\FzgModell;
use App\Http\Model\Frage;
use App\Http\Requests\CreateQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ErsatzteilController extends ErsatzteilTreffpunktController
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fahrzeuge = $this->getFahrzeugList();

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
        return view('pages.ersatzteil_frage');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        $input = $request -> all();
        $input ['bild_url'] = 'Kein Bild';

        $frage = new Frage;
        $frage -> titel = $input['titel'];

        Frage::create($request->all());

        return view('pages.ersatzteil_frage');
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

        //Übergabne der Daten und Zurückgeben der View

        return view('pages.treffpunkt_detail', [
            'fzgModelle'=> $fahrzeuge,
            'fzgCount'=> $fahrzeuge->count() ]);


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
}
