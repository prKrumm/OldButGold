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
        $emails = DB::table('kontaktanfrage')->orderBy('kontaktanfrage_id', 'desc')->paginate(4);
        $fragen = DB::table('frage')->where('rubrik', 'frage')->paginate(5);
        $gesuche = DB::table('frage')->where('rubrik', 'gesuch')->paginate(5);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->frage_id;
        $frage = DB::table('frage')->where('frage_id', $id)->delete();

        return redirect()->action('AdminController@index');

    }


    public function emailInhalt (Request $request) {
        $emailId = $request->emailId;

        $emails = DB::table('kontaktanfrage')->where('kontaktanfrage_id', '=' , $emailId)->get();

        return $emails;

    }
}
