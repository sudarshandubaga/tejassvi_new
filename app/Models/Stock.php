<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_attribute_id',
        'ware_house_id',
        'qty',
        'type',
        'remarks'
    ];

    public function product_attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function ware_house()
    {
        return $this->belongsTo(WareHouse::class);
    }
}
