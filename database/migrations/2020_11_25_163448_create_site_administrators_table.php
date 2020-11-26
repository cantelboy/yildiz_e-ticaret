<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_administrators', function (Blueprint $table) {
            $table->id();
            $table->string('KullaniciAdi');
            $table->string('Sifre');
            $table->string('IsimSoyisim');
            $table->string('EmailAdresi');
            $table->string('TelefonNumarasi');
            $table->tinyInteger('SilinemeyecekYoneticiDurumu');
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
        Schema::dropIfExists('site_administrators');
    }
}

