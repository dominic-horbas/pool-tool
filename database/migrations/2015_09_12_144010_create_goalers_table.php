<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goalers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pooler_id')->unsigned()->nullable();
            $table->foreign('pooler_id')->references('id')->on('poolers');
            $table->string('name');
            $table->integer('games_played');
            $table->integer('wins');
            $table->integer('shutouts');
            $table->float('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goalers');
    }
}
