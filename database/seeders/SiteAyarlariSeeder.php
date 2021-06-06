<?php

namespace Database\Seeders;

use App\Models\SiteAyarlari;
use Illuminate\Database\Seeder;

class SiteAyarlariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteAyarlari::create(
            [
                'SiteAdi'=> 'Yıldız E-Ticaret',
                'SiteTitle'=> 'E-Alışveriş Mağzası',
                'SiteDescription'=> 'Her türlü e-alışveriş hzılı sipariş ve zamanıda teslimat sizler için en kaliteli hizmet',
                'SiteKeywords' => 'En iyi fiyat ve ürün kalitee garantisi ile binlerce çeşit ürünleri ile sizlere hizmet vermek için burdayız',
                'SiteCopyrightMetni'=> 'Copyright 2020 - Yıldız E-Ticater - Tüm Hakları Saklıdır.',
                'SiteLogosu'=> 'Logo.png',
                'SiteLinki'=> 'http://127.0.0.1:8000/',
                'SiteEmailAdresi'=> 'fplayizle3@gmail.com',
                'SiteEmailSifresi'=> '013579tc',
                'SiteEmailHostAdresi'=> 'smtp.gmail.com',
                'SosyalLinkFacebook'=> 'https://www.facebook.com',
                'SosyalLinkTwitter'=> 'https://www.twitter.com',
                'SosyalLinkLinkedin'=> 'https://www.linkedin.com',
                'SosyalLinkInstagram'=> 'https://www.instagram.com',
                'SosyalLinkPinterest'=> 'https://www.pinterest.com',
                'SosyalLinkYouTube'=> 'https://www.youtube.com',
                'DolarKuru'=> '7.63',
                'EuroKuru' =>'9.06',
                'UcretsizKargoBaraji'=> '250',
                'ClientID'=> '00000000',
                'StoreKey'=> '11111111',
                'ApiKullanicisi'=> '3DKullanicim',
                'ApiSifresi'=> '3DSifrem',
              ]
        );


    }
}



