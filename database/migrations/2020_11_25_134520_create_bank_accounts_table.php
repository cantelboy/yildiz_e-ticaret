<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('BankaLogosu',30);
            $table->string('BankaAdi',100);
            $table->string('KonumSehir',100);
            $table->string('KonumUlke',100);
            $table->string('SubeAdi',100);
            $table->string('SubeKodu',100);
            $table->string('ParaBirimi',100);
            $table->string('HesapSahibi',255);
            $table->string('HesapNumarasi',100);
            $table->string('IbanNumarasi',100);

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
        Schema::dropIfExists('bank_accounts');
    }
}

