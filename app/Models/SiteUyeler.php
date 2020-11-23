<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteUyeler extends Model
{
    use HasFactory;
  
    protected $fillable = ['EmailAdresi','Sifre','IsimSoyisim','TelefonNumarasi','Cinsiyet','Durumu','SilinmeDurumu','KayitTarihi','KayitIpAdresi','AktivasyonKodu'];
    
}
