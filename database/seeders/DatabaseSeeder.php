<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\SiteUyeler::create([
            'IsimSoyisim' => Str::random(10),
            'TelefonNumarasi' =>Str::random(11),
            'Cinsiyet' =>'male',
            'Durumu' => '1',
            'SilinmeDurumu'=>0,
            'KayitTarihi' =>1120,
            'KayitIpAdresi' => '::1',
            'AktivasyonKodu' => Str::random(5),
            'EmailAdresi' =>'info@yildizticaret.com',
            'Sifre' => '11223', // password
        ]);
        // \App\Models\User::create([
        //     'name' => 'kadir',
        //     'email' => 'kadiryildiz@hotmail.com.tr',
        //     'email_verified_at' => now(),
        //     'password' =>Hash::make('11223344'), // password
        //     'remember_token' => Str::random(10),
        // ]);
        $this->call(SiteAyarlariSeeder::class);

    }
}

