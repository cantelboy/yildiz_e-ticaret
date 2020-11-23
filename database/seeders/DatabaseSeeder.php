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
     
            //USER CREATE YORUM SATIRINDA KAPALI KULLANILACAĞI ZAMAN AÇILACAKTIR...!


        //   \App\Models\User::factory(10)->create();

       
     


         \App\Models\SiteUyeler::factory(10)->create();

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

