<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thema extends Model
{
    /**
     * Name of the table in the database that the model is mapped to
     *
     * @var string
     */
    protected $table = 'thema';

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'thema_id';

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
        'bezeichnung',
    ];

    /**
     * The user that belong to the thema.
     * N zu M Beziehung
     */
    public function user()
    {
        return $this->belongsToMany('App\Thema');
    }

    /**
     * The fragen that belong to the thema.
     * N zu M Beziehung
     */
    public function fragen()
    {
        return $this->belongsToMany('App\Frage');
    }
}
