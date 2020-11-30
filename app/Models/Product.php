<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'MenuId','UrunTuru','UrunAdi','UrunFiyati','ParaBirimi','KdvOrani','UrunAciklamasi','UrunResmiBir','UrunResmiIki','UrunResmiUc','UrunResmiDort',
        'VaryantBasligi','KargoUcreti','Durumu','ToplamSatisSayisi','YorumSayisi','ToplamYorumPuani','GoruntulenmeSayisi'

    ];
}



