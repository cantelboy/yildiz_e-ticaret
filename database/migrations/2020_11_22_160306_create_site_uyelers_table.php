<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteUyelersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_uyelers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EmailAdresi',50);
            $table->string('Sifre');
            $table->string('IsimSoyisim',50);
            $table->string('TelefonNumarasi',50);
            $table->string('Cinsiyet',50);
            $table->integer('Durumu')->unsigned();
            $table->integer('SilinmeDurumu');
            $table->integer('KayitTarihi');
            $table->string('KayitIpAdresi',50);
            $table->string('AktivasyonKodu',50);
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
        Schema::dropIfExists('site_uyelers');
    }
}

