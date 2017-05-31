<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{

    /**
     * Name of the table in the database that the model is mapped to
     *
     * @var string
     */
    protected $table = 'addresse';

    /**
     * Name of the Primary key in the database table
     *
     * @var string
     */
    protected $primaryKey = 'addresse_id';

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
        'title', 'company', 'first_name', 'last_name', 'address_text', 'street', 'house_number', 'post_id', 'zipcode', 'city', 'country_id',
    ];

    /**
     * 1:1 assiciation between adresse and user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
