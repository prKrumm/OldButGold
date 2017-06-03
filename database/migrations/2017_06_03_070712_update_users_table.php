<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rolle_id')->unsigned()->after('bild_url')->default('');

            $table->foreign('rolle_id')->references('rolle_id')->on('rolle');
        });
        /*
         *             $table->increments('user_id')->unique();
            $table->string('name');
            $table->string('first_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
         */
        DB::table('users')->insert(
            array(
                'name' => 'Schreiner',
                'first_name' => 'Viktoria',
                'user_name' => 'Vk',
                'email' => 'Viktoria.schreiner@konstanz.de',
                'password' => 'geheim',
                'rolle_id' => '1'
            )
        );
    }




/**
 * Reverse the migrations.
 *
 * @return void
 */
public
function down()
{
    Schema::table('users', function ($table) {
        $table->dropForeign('rolle_id');
    });
}
}
