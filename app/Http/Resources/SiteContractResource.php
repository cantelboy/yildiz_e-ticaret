<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteContractResource extends JsonResource
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
            "HakkimizdaMetni"=>$this->HakkimizdaMetni,
            "UyelikSozlesmesiMetni"=>$this->UyelikSozlesmesiMetni,
            "KullanimKosullariMetni"=>$this->KullanimKosullariMetni, 
            "GizlilikSozlesmesiMetni"=>$this->GizlilikSozlesmesiMetni,
            "MesafeliSatisSozlesmesiMetni"=>$this->MesafeliSatisSozlesmesiMetni, 
            "TeslimatMetni"=>$this->TeslimatMetni, 
            "IptalIadeDegisimMetni"=>$this->IptalIadeDegisimMetni, 
            ];
    }
}



