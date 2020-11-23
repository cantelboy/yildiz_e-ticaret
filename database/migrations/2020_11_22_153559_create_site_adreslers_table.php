<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSiteAdreslersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_adreslers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uye_id')->unsigned()->nullable();
            $table->string('AdiSoyadi',100);
            $table->string('Adres',255);
            $table->string('Ilce',100);
            $table->string('Sehir',100);
            $table->string('TelefonNumarasi',11);
            $table->timestamps();
        });
        // Schema::table('site_adreslers', function (Blueprint $table) {
        //     $table->foreign('uye_id')->references('id')->on('site_uyelers')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('site_adreslers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}



