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
        $user = $this->showUser();

        if($user->rolle_id == 3){
            return redirect()->action('AdminController@index');
        } else {

        //Adresse
        $addresse = $this->showAdress($user->user_id);

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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->showUser();
        $addresse = $this->showAdress($user->user_id);
        return view('pages.profil_aendern', [
                'user' => $user,
                'adresse' => $addresse,
            ]);
    }





    public function showAdress($id)
    {
        return Adresse::all()->where('user_id', '==', $id)->first();

    }

    public function showUser()
    {
        return Auth::user();
    }
}
