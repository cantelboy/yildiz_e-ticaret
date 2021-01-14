<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'MenuId','UrunAdi','UrunFiyati','ParaBirimi','KdvOrani','UrunAciklamasi','VaryantBasligi','KargoUcreti','Durumu','ToplamSatisSayisi','YorumSayisi','ToplamYorumPuani','GoruntulenmeSayisi'

    ];

    public function variants()
    {
        return $this->hasMany('ProductVariant');

    }
}



