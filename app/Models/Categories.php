<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug', 'color'];

    public function subcategories()
    {
        return $this->hasMany(Subcategories::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
