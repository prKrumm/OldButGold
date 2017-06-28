<?php

namespace App\Http\Controllers;

use App\Http\Model\Adresse;
use App\Http\Model\Antwort;
use App\Http\Model\Frage;
use App\Http\Model\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->rolle_id == 3){
            return redirect()->action('AdminController@index');
        } else {

            //Adresse
            $addresse = Adresse::all()->where('user_id', '==', $user->user_id)->first();

            //kummulierte Votes je User ermitteln
            $sumVotes = Vote::query()
                ->select(DB::raw('sum(vote.value) AS totalVotes, vote.antwort_id, antwort.user_id'))
                ->join('antwort', 'vote.antwort_id', '=', 'antwort.antwort_id')
                ->where('antwort.user_id', '=', $user->user_id)
                ->groupBy('antwort.user_id')
                ->get()
                ->first();

            if ($sumVotes == null) {
                $sumVotes = new Vote();
                $sumVotes->totalVotes = 0;
            }

            //Gesuche holen
            $gesuche = Frage::all()
                ->where('user_id', '=', $user->user_id)
                ->where('rubrik', '=', 'Gesuch');

            $fragen = Frage::all()
                ->where('user_id', '=', $user->user_id)
                ->where('rubrik', '=', 'Frage');


            //Anzahl Fragen/Antworten
            $countFragen = Frage::all()->where('user_id', '==', $user->user_id)->count();
            $countAntwort = Antwort::all()->where('user_id', '==', $user->user_id)->count();


            return view('pages.profil', [
                'user' => $user,
                'adresse' => $addresse,
                'countFrag' => $countFragen,
                'countAntwort' => $countAntwort,
                'ranking' => $sumVotes,
                'gesuche' => $gesuche,
                'fragen' => $fragen,
            ]);
        }
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
