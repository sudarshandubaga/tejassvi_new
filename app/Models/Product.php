<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'attributes' => 'array'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getProductImagesAttribute()
    {
        $images = [];

        if (!empty($this->image)) {
            $images[$this->thumb_image] = $this->image;
        }

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $images[$image->thumb_image] = $image->image;
            }
        }

        return $images;
    }

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

    public function getCategoryNameAttribute()
    {
        $categoryName = '';
        if (!empty($this->category?->parent?->parent)) {
            $categoryName .= $this->category?->parent?->parent?->name . ' / ';
        }
        if (!empty($this->category?->parent)) {
            $categoryName .= $this->category?->parent?->name . ' / ';
        }
        $categoryName .= $this->category?->name ?: 'Uncategorized';
        return $categoryName;
    }

    protected function makeLink($label, $link = '#')
    {
        return '<li class="breadcrumb-item"><a href="' . $link . '" title="' . $label . '">' . $label . '</a></li>';
    }

    public function getColorsAttribute()
    {
        $colorIds = $this->color_ids ? explode(",", $this->color_ids) : [];

        $colorArr = [];
        foreach ($colorIds as $cId) {
            $color = Color::find($cId);
            $colorArr[$cId] = $color->name;
        }

        return $colorArr;
    }

    public function getBreadcrumbsAttribute()
    {
        $breadcrumbs = $this->makeLink("<i class='bi bi-house-door'></i> Home", route('home'));
        if (!empty($this->category?->parent?->parent)) {
            $breadcrumbs .= $this->makeLink(
                $this->category?->parent?->parent?->name,
                $this->category?->parent?->parent?->link,
            );
        }
        if (!empty($this->category?->parent)) {
            $breadcrumbs .= $this->makeLink(
                $this->category?->parent?->name,
                $this->category?->parent?->link
            );
        }
        $breadcrumbs .= $this->makeLink(
            $this->category?->name ?: 'Uncategorized',
            $this->category?->link
        );

        $breadcrumbs .= '<li class="breadcrumb-item active" aria-current="page">' . $this->name . '</li>';

        return $breadcrumbs;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductAttribute::class)->orderBy('trade_price', 'DESC');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('id');
    }
}
