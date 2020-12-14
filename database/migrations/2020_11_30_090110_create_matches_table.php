<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            //$table->foreignId('equipe_id')->constrained();
            $table->string('name');
            $table->string('pays');
            $table->integer('cote');
            $table->integer('duree');
            $table->unsignedBigInteger('equipe_id')->index();
            $table->string('image');
            $table->timestamps();

            //$table->foreign('equipe_id')->references('id')->on('equipes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
