<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frage', function (Blueprint $table) {
            $table->increments('frage_id')->unique();
            $table->string('titel');
            $table->string('text');
            //Funktion Bilder hochladen aktuell nicht geplant
            $table->string('bild_url');
            $table->integer('fzg_modell_id')->unsigned()->default('');
            $table->integer('user_id')->unsigned()->default('');

            $table->foreign('fzg_modell_id')->references('fzg_modell_id')->on('fzg_modell');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamps();
        });
        DB::table('frage')->insert(
            array(
                'titel' => ' Artikelnummer von Benz umschlüsseln? A 180 411 05 15',
                'text' => 'Kann mir wer helfen damit? ',
                'bild_url'=>'235klejsrtj@lk4',
                'fzg_modell_id'=>1,
                'user_id'=>1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frage');
    }
}
