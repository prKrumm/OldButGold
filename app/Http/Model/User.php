<?php

namespace app\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'first_name', 'user_name', 'email','password',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'user_id';


    /**
     * 1:1 assiciation between user and adresse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adresse()
    {
        return $this->hasOne('App\Adresse');
    }

    /**
     * N:1 assiciation between user and rolle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rolle()
    {
        return $this->belongsTo('App\Rolle');
    }

    /**
     * The themen that belong to the user.
     * N zu M Beziehung
     */
    public function themen()
    {
        return $this->belongsToMany('app\Http\Model\Thema');
    }

    /**
     * The user that belong to the fzgModell.
     * N zu M Beziehung
     */
    public function fahrzeuge()
    {
        return $this->belongsToMany('app\Http\Model\FzgModell');
    }

    /**
     * Get the fragen for the user.
     */
    public function fragen()
    {
        return $this->hasMany('app\Http\Model\Frage');
    }

    /**
     * Get the votes for the user.
     */
    public function votes()
    {
        return $this->hasMany('app\Http\Model\Vote');
    }

    /**
     * Get the antworten for the user.
     */
    public function antworten()
    {
        return $this->hasMany('app\Http\Model\Antwort');
    }


}
