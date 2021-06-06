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
                'name' => 'Erkek Ayakkabisi'

            ],
            [
                'parentId'=> null,
                'name' => 'Kadin Ayakkabisi'

            ],
            [
                'parentId'=> null,
                'name' => 'Cocuk Ayakkabisi'

            ],
            [
                'parentId'=> 1,
                'name' => 'Kalsik Ayakkabilar'

            ],
            [
                'parentId'=> 1,
                'name' => 'Kışlık Ayakkabilar'

            ],
            [
                'parentId'=> 1,
                'name' => 'Spor Ayakkabilar'

            ],
            [
                'parentId'=> 2,
                'name' => 'Topuklu Ayakkabilar'

            ],
            [
                'parentId'=> 2,
                'name' => 'Çizme Model Ayakkabilar'

            ],
            [
                'parentId'=> 2,
                'name' => 'Klasik Ayakkabilar'

            ],
            [
                'parentId'=> 3,
                'name' => 'Çizgi Karakteri Ayakkabilar'

            ],
            [
                'parentId'=> 3,
                'name' => 'Işıklı Ayakkabilar'

            ],
            [
                'parentId'=> 3,
                'name' => 'Su Geçirmez Ayakkabilar'

            ],

        ];

           foreach($categories as $category ){
            SiteMenu::create($category);

         }




    }
}
