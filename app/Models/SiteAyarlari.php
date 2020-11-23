<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteAyarlari extends Model
{   
    use HasFactory;
    protected $fillable = [
        'SiteAdi', 'SiteTitle','SiteDescription','SiteCopyrightMetni','SiteLogosu','SiteLinki','SiteEmailAdresi','SiteEmailSifresi','SiteEmailHostAdresi',
        'SosyalLinkFacebook','SosyalLinkTwitter','SosyalLinkLinkedin','SosyalLinkInstagram','SosyalLinkPinterest','SosyalLinkYouTube','DolarKuru','EuroKuru',
        'UcretsizKargoBaraji','ClientID','StoreKey','ApiKullanicisi','ApiSifresi'
    ];
}



