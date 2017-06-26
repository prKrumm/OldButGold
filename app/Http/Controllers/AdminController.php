<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = DB::table('Kontaktanfrage')->orderBy('kontaktanfrage_id', 'desc')->paginate(4);
        $fragen = DB::table('Frage')->where('rubrik', 'Frage')->paginate(5);
        $gesuche = DB::table('Frage')->where('rubrik', 'Gesuch')->paginate(5);
        return view('pages.admin', [
            'emails' => $emails,
            'fragen' => $fragen,
            'gesuche' => $gesuche
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->frage_id;
        $frage = DB::table('Frage')->where('frage_id', $id)->delete();

        return redirect()->action('AdminController@index');

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

    public function emailInhalt (Request $request) {
        $emailId = $request->emailId;

        $emails = DB::table('Kontaktanfrage')->where('kontaktanfrage_id', '=' , $emailId)->get();

        return $emails;

    }
}
