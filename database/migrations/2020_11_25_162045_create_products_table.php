<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('MenuId');
            $table->string('UrunTuru',100);
            $table->string('UrunAdi',255);
            $table->double('UrunFiyati');
            $table->char('ParaBirimi');
            $table->integer('KdvOrani');
            $table->text('UrunAciklamasi');
            $table->string('UrunResmiBir',30);
            $table->string('UrunResmiIki',30);
            $table->string('UrunResmiUc',30);
            $table->string('UrunResmiDort',30);
            $table->string('VaryantBasligi',100);
            $table->double('KargoUcreti');
            $table->tinyInteger('Durumu');
            $table->integer('ToplamSatisSayisi');
            $table->tinyInteger('YorumSayisi');
            $table->integer('ToplamYorumPuani');
            $table->integer('GoruntulenmeSayisi');
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
        Schema::dropIfExists('products');
    }
}


 
    
