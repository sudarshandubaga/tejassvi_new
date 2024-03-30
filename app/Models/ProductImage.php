<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getMdImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getThumbImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
