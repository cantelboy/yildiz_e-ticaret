<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('UyeId');
            $table->integer('SiparisNumarasi');
            $table->integer('UrunId');
            $table->string('UrunTuru',50);
            $table->string('UrunAdi',255);
            $table->double('UrunFiyati', 15, 8);
            $table->integer('KdvOrani');
            $table->integer('UrunAdedi');
            $table->double('ToplamUrunFiyati', 15, 8);
            $table->string('KargoFirmasiSecimi',100);
            $table->double('KargoUcreti', 15, 8);
            $table->string('UrunResmiBir',30);
            $table->string('VaryantBasligi',100);
            $table->string('VaryantSecimi',100);
            $table->string('AdresAdiSoyadi',100);
            $table->string('AdresDetay',255);
            $table->string('AdresTelefon',11);
            $table->string('OdemeSecimi',25);
            $table->integer('TaksitSecimi');
            $table->integer('SiparisTarihi');
            $table->string('SiparisIpAdresi',20);
            $table->integer('OnayDurumu');
            $table->integer('KargoDurumu');
            $table->string('KargoGonderiKodu',30);
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
        Schema::dropIfExists('orders');
    }
}
