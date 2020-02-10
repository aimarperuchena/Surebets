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
            $table->date('date');
            $table->string('match');
            $table->string('team1');
            $table->string('team2');
            $table->float('odd1');
            $table->float('odd2');
            $table->float('odd3');
            $table->unsignedBigInteger('bookie1_id');
            $table->unsignedBigInteger('bookie2_id');
            $table->unsignedBigInteger('bookie3_id');
            $table->float('percentage');
            $table->timestamps();

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
