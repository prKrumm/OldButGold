<?php

namespace App\Http\Controllers;

use App\Http\Model\Antwort;
use App\Http\Requests\CreateAnswerRequest;
use Illuminate\Http\Request;

class AntwortController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAntwort(Request $request)
    {
        //validate
        //store
        $antwort = new Antwort();

        //Relevanten Daten aus Form
        $antwort->text = $request->text;
        $antwort->frage_id = $request->frage_id;
        $antwort->user_id = $request->user_id;

        $antwort->save();
    }
}
