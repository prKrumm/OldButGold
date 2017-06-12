<?php

namespace app\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


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
        return $this->belongsToMany('app\Http\Model\User');
    }

    /**
     * Get the fragen for the fzgModell.
     */
    public function fragen()
    {
        return $this->hasMany('app\Http\Model\Frage');
    }


    public static function getFzgById($Id){
        return FzgModell::all()->where('fzg_modell_id','==',$Id)->first();
       // return DB::table('fzg_modell')
         //   ->where('fzg_modell_id', '=', $Id);
    }









}
