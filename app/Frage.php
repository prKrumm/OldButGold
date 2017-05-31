<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frage extends Model
{

    /**
     * Name of the table in the database that the model is mapped to
     *
     * @var string
     */
    protected $table = 'frage';

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'frage_id';

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
        'text','titel','bild_url',
    ];

    /**
     * The fragen that belong to the thema.
     * N zu M Beziehung
     */
    public function themen()
    {
        return $this->belongsToMany('App\Thema');
    }

    /**
     * Get the fzgModell that owns the Frage.
     */
    public function fzgModell()
    {
        return $this->belongsTo('App\FzgModell');
    }

    /**
     * Get the frage that owns the user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
