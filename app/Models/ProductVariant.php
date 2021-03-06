<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = ['productId','VaryantAdi','StokAdedi'];

    public function product()
    {
        
        return $this->belongsTo('Product');
    }
    
}



