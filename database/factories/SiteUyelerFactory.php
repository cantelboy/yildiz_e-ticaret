<?php

namespace Database\Factories;

use App\Models\SiteUyeler;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;



class SiteUyelerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteUyeler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'EmailAdresi' => $this->faker->unique()->safeEmail,
            'IsimSoyisim' => $this->faker->name,
            'Sifre' =>Hash::make('11223344'),
            'TelefonNumarasi' => $this->faker->name,
            'Cinsiyet' => $this->faker->name,
            'Durumu' => 1,
            'SilinmeDurumu' =>0,
            'KayitTarihi' =>111111,
            'KayitIpAdresi' =>'::1',
            'AktivasyonKodu' =>$this->faker->title,
        ];

    }
}

