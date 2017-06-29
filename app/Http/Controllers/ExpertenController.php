<?php

namespace App\Http\Controllers;

use app\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $whereExtension = array(['users.rolle_id', '=', 1]);

        if (isset($request->fahrzeug)) {

            $fzg_id = $request->fahrzeug;
            if($fzg_id>0){
                array_push($whereExtension, ['user_waehlt_modell.fzg_modell_id', '=', $fzg_id]);
            }
        }


        $ersatzteilController=new ErsatzteilTreffpunktController();
        $experten=DB::table('users')->leftJoin('user_waehlt_modell', 'users.user_id', '=', 'user_waehlt_modell.user_id')
            ->where($whereExtension)
            ->paginate(12);
        $fahrzeugeTop = $ersatzteilController->getFahrzeugListTop();
        $fahrzeugeRest=$ersatzteilController->getFahrzeugListRest();

        



        //Übergabe der Daten und Zurückgeben der View
        return view('pages.experten',[
            'fzgTop' => $fahrzeugeTop,
            'fzgRest' => $fahrzeugeRest,
            'experten' => $experten,]);
    }

}
