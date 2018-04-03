<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNieuwspost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nieuwspost', function (Blueprint $table) {
            $table->increments('nieuws_id');
            $table->text('titel');
            $table->text('content');
            $table->text('foto');
            $table->integer('gebruiker_id');
            $table->date('timestamp');
                     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nieuwspost', function (Blueprint $table) {
            //
        });
    }
}
