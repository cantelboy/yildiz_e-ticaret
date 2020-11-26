<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteShopBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_shop_baskets', function (Blueprint $table) {
            $table->id();
            $table->integer('SepetNumarasi');
            $table->integer('UyeId');
            $table->integer('UrunId');
            $table->integer('AdresId');
            $table->integer('VaryantId');
            $table->integer('KargoId');
            $table->integer('UrunAdedi');
            $table->string('OdemeSecimi');
            $table->integer('TaksitSecimi');
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
        Schema::dropIfExists('site_shop_baskets');
    }
}

  