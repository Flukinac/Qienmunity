<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('user_id');
            $table->unsignedInteger('nieuwspost_id')->nullable();
            $table->foreign('nieuwspost_id')->references('id')->on('nieuwsposts')->onDelete('cascade');
            $table->unsignedInteger('communitypost_id')->nullable();
            $table->foreign('communitypost_id')->references('id')->on('communityposts')->onDelete('cascade');
            $table->unsignedInteger('resourcepost_id')->nullable();
            $table->foreign('resourcepost_id')->references('id')->on('resourceposts')->onDelete('cascade');
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
        Schema::drop('comments');
    }
}
