<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_equipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('equipe_id');
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches')
            ->onDelete('cascade');
            $table->foreign('equipe_id')->references('id')->on('equipes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches_equipes');
    }
}
