<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteAyarlarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_ayarlaris', function (Blueprint $table) {
            $table->id();
            $table->string('SiteAdi',50);
            $table->string('SiteTitle',60);
            $table->string('SiteDescription',150);
            $table->string('SiteKeywords',255);
            $table->string('SiteCopyrightMetni',255);
            $table->string('SiteLogosu',255);
            $table->string('SiteLinki',255);
            $table->string('SiteEmailAdresi',255);
            $table->string('SiteEmailSifresi',255);
            $table->string('SiteEmailHostAdresi',255);
            $table->string('SosyalLinkFacebook',255);
            $table->string('SosyalLinkTwitter',255);
            $table->string('SosyalLinkLinkedin',255);
            $table->string('SosyalLinkInstagram',255);
            $table->string('SosyalLinkPinterest',255);
            $table->string('SosyalLinkYouTube',255);
            $table->integer('DolarKuru')->unsigned();
            $table->integer('EuroKuru')->unsigned();
            $table->integer('UcretsizKargoBaraji')->unsigned();
            $table->string('ClientID',100);
            $table->string('StoreKey',100);
            $table->string('ApiKullanicisi',100);
            $table->string('ApiSifresi',100);
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
        Schema::dropIfExists('site_ayarlaris');
    }
}



