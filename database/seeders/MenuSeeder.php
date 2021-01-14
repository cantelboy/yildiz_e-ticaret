<?php

namespace Database\Seeders;

use App\Models\SiteMenu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'parentId'=> null,
                'MenuAdi' => 'Erkek Ayakkabisi'
           
            ],
            [
                'parentId'=> null,
                'MenuAdi' => 'Kadin Ayakkabisi'
           
            ],
            [
                'parentId'=> null,
                'MenuAdi' => 'Cocuk Ayakkabisi'
           
            ],
            [
                'parentId'=> 1,
                'MenuAdi' => 'Kalsik Ayakkabilar'
           
            ],
            [
                'parentId'=> 1,
                'MenuAdi' => 'Kışlık Ayakkabilar'
           
            ],
            [
                'parentId'=> 1,
                'MenuAdi' => 'Spor Ayakkabilar'
           
            ],
            [
                'parentId'=> 2,
                'MenuAdi' => 'Topuklu Ayakkabilar'
           
            ],
            [
                'parentId'=> 2,
                'MenuAdi' => 'Çizme Model Ayakkabilar'
           
            ],
            [
                'parentId'=> 2,
                'MenuAdi' => 'Klasik Ayakkabilar'
           
            ],
            [
                'parentId'=> 3,
                'MenuAdi' => 'Çizgi Karakteri Ayakkabilar'
           
            ],
            [
                'parentId'=> 3,
                'MenuAdi' => 'Işıklı Ayakkabilar'
           
            ],
            [
                'parentId'=> 3,
                'MenuAdi' => 'Su Geçirmez Ayakkabilar'
           
            ],

        ];

           foreach($categories as $category ){
            SiteMenu::create($category);
          
         }

         
   
        
    }
}
