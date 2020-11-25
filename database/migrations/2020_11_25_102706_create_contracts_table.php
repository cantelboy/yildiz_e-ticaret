<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->text('HakkimizdaMetni');
            $table->text('UyelikSozlesmesiMetni');
            $table->text('KullanimKosullariMetni');
            $table->text('GizlilikSozlesmesiMetni');
            $table->text('MesafeliSatisSozlesmesiMetni');
            $table->text('TeslimatMetni');
            $table->text('IptalIadeDegisimMetni');
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
        Schema::dropIfExists('contracts');
    }
}

