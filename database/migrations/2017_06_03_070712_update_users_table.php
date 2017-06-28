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
            $table->integer('rolle_id')->unsigned()->after('bild_url');

            $table->foreign('rolle_id')->references('rolle_id')->on('rolle');
        });
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
