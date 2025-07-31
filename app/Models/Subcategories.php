<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    protected $fillable = ['id', 'name', 'img', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
