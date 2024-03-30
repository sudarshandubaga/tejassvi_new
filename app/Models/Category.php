<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class)->orderBy('name');
    }

    protected function getIds($categories, $ids = [])
    {
        if (!empty($categories)) {
            foreach ($categories as $cat) {
                $ids[] = $cat->id;

                if (!empty($cat->categories)) {
                    $ids = $this->getIds($cat->categories, $ids);
                }
            }
        }

        return $ids;
    }

    public function getCategoryIdsAttribute()
    {
        return array_unique($this->getIds($this->categories));
    }

    public function getLinkAttribute()
    {
        $category = [];
        if (!empty($this->parent->parent)) {
            $category[] = $this->parent->parent->slug;
        }
        if (!empty($this->parent)) {
            $category[] = $this->parent->slug;
        }

        $category[] = $this->slug;
        // dd($category);

        return route('product.index', $category);
    }

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
