<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrenDeclaratieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours_declarations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('amount');
            $table->string('type');
            $table->string('statement');
            $table->integer('status')->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hours_declarations');
    }
}
