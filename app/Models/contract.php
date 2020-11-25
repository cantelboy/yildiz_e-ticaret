<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;
    protected $fillable = [ 'HakkimizdaMetni','UyelikSozlesmesiMetni','KullanimKosullariMetni','GizlilikSozlesmesiMetni','MesafeliSatisSozlesmesiMetni','TeslimatMetni','IptalIadeDegisimMetni' ];
}




