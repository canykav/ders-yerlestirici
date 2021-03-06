<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Saatler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saatler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gun')->nullable();
            $table->time('baslangic');
            $table->time('bitis');
            $table->set('ogretim',['Örgün Öğretim','İkinci Öğretim']);
            $table->foreign('gun')->references('id')->on('gunler')->onDelete('cascade');
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
