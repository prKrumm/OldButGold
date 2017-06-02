<?php

namespace App\Http\Controllers\Auth;


use App\Http\Model\User;
use App\Http\Model\Adresse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'user_role' => 'required',
            'first_name' => 'required|max:50',
            'name' => 'required|max:255',
            'user_name' => 'required|max:255',
            'street' => 'required',
            'plz' => 'required',
            'ort' => 'required',
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
        //save Adresse
        //$address = new Adresse($data);
        //$address->save();

        //save Role


        return $user;
    }
}
