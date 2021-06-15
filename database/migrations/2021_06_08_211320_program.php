<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Program extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('saat');
        $table->unsignedBigInteger('ders');
        $table->unsignedBigInteger('ogretmen');
        $table->unsignedBigInteger('derslik');
        $table->foreign('saat')->references('id')->on('saatler')->onDelete('cascade');
        $table->foreign('ders')->references('id')->on('dersler')->onDelete('cascade');
        $table->foreign('ogretmen')->references('id')->on('ogretmenler')->onDelete('cascade');
        $table->foreign('derslik')->references('id')->on('derslikler')->onDelete('cascade');
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
