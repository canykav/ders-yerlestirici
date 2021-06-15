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
            $table->set('gun',['Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi','Pazar']);
            $table->time('baslangic');
            $table->time('bitis');
            $table->set('ogretim',['Örgün Öğretim','İkinci Öğretim']);
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
