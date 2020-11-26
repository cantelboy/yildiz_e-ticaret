<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTransferNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transfer_notices', function (Blueprint $table) {
            $table->id();
            $table->integer('BankaId')->unsigned();
            $table->string('AdiSoyadi',100);
            $table->string('EmailAdresi',255);
            $table->string('TelefonNumarasi',11);
            $table->text('Aciklama');
            $table->integer('IslemTarihi');
            $table->integer('Durum');
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
        Schema::dropIfExists('bank_transfer_notices');
    }
}

 