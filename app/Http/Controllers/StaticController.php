<?php

namespace App\Http\Controllers;

use App\Http\Requests\KontaktQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function tour()
    {
        return view('pages.tour');
    }

    public function impressum()
    {
        return view('pages.impressum');
    }

    public function kontakt()
    {
        return view('pages.kontakt');
    }

    public function ueberuns()
    {
        return view('pages.ueberuns');
    }

    public function datenschutz()
    {
        return view('pages.datenschutz');
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
        //
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

    public function kontaktformular(KontaktQuestionRequest $request){

        $titel = $request->titel;
        $text = $request->text;
        $email = $request->email;

        date_default_timezone_set('Europe/Berlin');
        setlocale(LC_TIME, "de_DE.utf8");
        $date = date("F j, Y, g:i a");

        DB::table('Kontaktanfrage')->insert(
            ['titel' => $titel, 'text' => $text, 'email' => $email, 'gelesen' => false, "created_at" => $date]
        );

        return redirect('kontakt')-> with('status', 'Vielen Dank für Ihre Nachricht');

    }
}
