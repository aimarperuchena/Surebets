<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SurebetCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surebet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("sport_id");
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("league_id");
            $table->date('date');
            $table->string('match');
            $table->string('team1');
            $table->string('team2');
            $table->float('odd1')->nullable();
            $table->float('odd2')->nullable();
            $table->float('odd3')->nullable();
            $table->unsignedBigInteger('bookie1_id')->nullable();
            $table->unsignedBigInteger('bookie2_id')->nullable();
            $table->unsignedBigInteger('bookie3_id')->nullable();
            $table->float('percentage');
            $table->timestamps();

            $table->foreign('sport_id')->references('id')->on('sport');
            $table->foreign('country_id')->references('id')->on('country');
            $table->foreign('league_id')->references('id')->on('league');
            $table->foreign('bookie1_id')->references('id')->on('bookie');
            $table->foreign('bookie2_id')->references('id')->on('bookie');
            $table->foreign('bookie3_id')->references('id')->on('bookie');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surebet');
    }
}
