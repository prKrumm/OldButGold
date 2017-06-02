<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolle', function (Blueprint $table) {
            $table->increments('rolle_id');
            $table->string('bezeichnung');

            $table->timestamps();
        });


        DB::table('rolle')->insert(
            array(
                array(
                    'bezeichnung' => 'Händler'
                ),
                array(
                    'bezeichnung' => 'Oldtimer-Besitzer'
                ),
                array(
                    'bezeichnung' => 'Admin'
                )
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
        Schema::dropIfExists('rolle');
    }
}
