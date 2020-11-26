<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('UrunId');
            $table->integer('UyeId');
            $table->tinyInteger('Puan');
            $table->text('YorumMetni');
            $table->integer('YorumTarihi');
            $table->string('YorumIpAdresi',20);
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
        Schema::dropIfExists('shop_comments');
    }
}

