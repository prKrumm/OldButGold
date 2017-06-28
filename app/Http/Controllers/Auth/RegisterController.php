<?php

namespace App\Http\Controllers\Auth;


use app\Http\Model\Rolle;
use App\Http\Model\User;
use App\Http\Model\Adresse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rolle_id' => 'required',
            'first_name' => 'required|max:50',
            'name' => 'required|max:255',
            'user_name' => 'required|max:255|unique:users',
            'street' => 'required|max:255',
            'plz' => 'required|max:5',
            'ort' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //hash password
        $data['password'] = bcrypt($data['password']);


        //save User
        $user = new User($data);

        $user->save();
        $userId=$user->getAttributeValue("user_id");
        //save Adresse $array[$key] = $value;
        $data["user_id"]=$userId;
        $adressDate["street"]=$data["street"];
        $adressDate["plz"]=$data["plz"];
        $adressDate["ort"]=$data["ort"];
        $adressDate["user_id"]=$userId;

        $adresse=new Adresse();
        $adresse->user_id=$userId;
        $adresse->street=$data["street"];
        $adresse->plz=$data["plz"];
        $adresse->ort=$data["ort"];
        $adresse->save();



        //DB::table('adresse')->insert(
        //  $adressDate
        //);




        return $user;
    }
}
