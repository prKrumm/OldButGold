<?php

namespace app\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * Name of the table in the database that the model is mapped to
     *
     * @var string
     */
    protected $table = 'vote';

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'vote_id';

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
     * Get the antwort that owns the vote.
     */
    public function antwort()
    {
        return $this->belongsTo('app\Http\Model\Antwort');
    }

    /**
     * Get the vote that owns the user.
     */
    public function user()
    {
        return $this->belongsTo('app\Http\Model\User');
    }
}
