<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class FzgModell extends Model
{
    /**
     * Name of the table in the database that the model is mapped to
     *
     * @var string
     */
    protected $table = 'fzg_modell';

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'fzg_modell_id';

    /**
     * Tells the framework that the columns updated_at and created_at don't exist in the table
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hersteller', 'modell',
    ];

    /**
     * The user that belong to the fzgModell.
     * N zu M Beziehung
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Get the fragen for the fzgModell.
     */
    public function fragen()
    {
        return $this->hasMany('App\Frage');
    }







}
