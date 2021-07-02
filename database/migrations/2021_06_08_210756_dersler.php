<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dersler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dersler', function (Blueprint $table) {
            $table->id();
            $table->string('kod')->nullable();
            $table->string('ad');
            $table->unsignedBigInteger('bolum');
            $table->unsignedBigInteger('ogretmen');
            $table->integer('teorik')->nullable();
            $table->integer('lab')->nullable();
            $table->unsignedBigInteger('teorik_derslik')->nullable();
            $table->unsignedBigInteger('lab_derslik')->nullable();
            $table->foreign('bolum')->references('id')->on('bolumler')->onDelete('cascade');
            $table->foreign('ogretmen')->references('id')->on('ogretmenler')->onDelete('cascade');
            $table->foreign('teorik_derslik')->references('id')->on('derslikler')->onDelete('cascade');
            $table->foreign('lab_derslik')->references('id')->on('derslikler')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
