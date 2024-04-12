<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
