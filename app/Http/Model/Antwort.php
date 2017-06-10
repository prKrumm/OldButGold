<?php

namespace app\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Antwort extends Model
{
    /**
     * Name of the table in the database that the model is mapped to
     *
     * @var string
     */
    protected $table = 'antwort';

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'antwort_id';

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
        'value',
    ];


    /**
     * Get the antwort that owns the frage.
     */
    public function frage()
    {
        return $this->belongsTo('app\Http\Model\Frage', 'frage_id','frage_id');
    }

    /**
     * Get the antwort that owns the user.
     */
    public function user()
    {
        return $this->belongsTo('app\Http\User');
    }

    /**
     * Get the votes for the Antwort.
     */
    public function votes()
    {
        return $this->hasMany('App\Http\Model\Vote','antwort_id','antwort_id');
    }
}
