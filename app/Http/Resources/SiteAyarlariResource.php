<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteAyarlariResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

     

    public function toArray($request)
    {
        return [
            
        "id" =>$this->id ,
        "SiteAdi"=>$this->SiteAdi,
        "SiteTitle"=>$this->SiteTitle,
        "SiteDescription"=>$this->SiteDescription, 
        "SiteKeywords"=>$this->SiteKeywords,
        "SiteCopyrightMetni"=>$this->SiteCopyrightMetni, 
        "SiteLogosu"=>$this->SiteLogosu,
        "SiteLinki"=>$this->SiteLinki,
        "SiteEmailAdresi"=>$this->SiteEmailAdresi, 
        "SiteEmailSifresi"=>$this->SiteEmailSifresi,
        "SiteEmailHostAdresi"=>$this->SiteEmailHostAdresi,
        "SosyalLinkFacebook"=>$this->SosyalLinkFacebook,
        "SosyalLinkTwitter"=>$this->SosyalLinkTwitter,
        "SosyalLinkLinkedin"=>$this->SosyalLinkLinkedin,
        "SosyalLinkInstagram"=>$this->SosyalLinkInstagram,
        "SosyalLinkPinterest"=>$this->SosyalLinkPinterest,
        "SosyalLinkYouTube"=>$this->SosyalLinkYouTube,
        "DolarKuru"=>$this->DolarKuru,
        "EuroKuru"=>$this->EuroKuru,
        "UcretsizKargoBaraji"=>$this->UcretsizKargoBaraji,
        "ClientID"=>$this->ClientID,
        "StoreKey"=>$this->StoreKey,
        "ApiKullanicisi"=>$this->ApiKullanicisi,
        "ApiSifresi"=>$this->ApiSifresi,
   
        ];
    }
}


