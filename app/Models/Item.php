<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    protected $fillable = ['name', 'slug', 'category_id', 'subcategory_id', 'location', 'note', 'expiration_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategories::class);
    }

    public function expirationDates()
    {
        return $this->hasMany(ExpirationDate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = static::generateUniqueSlug($item->name);
        });

        static::updating(function ($item) {
            if ($item->isDirty('name')) {
                $item->slug = static::generateUniqueSlug($item->name, $item->id);
            }
        });
    }

    // Fungsi pembantu untuk generate slug unik
    protected static function generateUniqueSlug($name, $excludeId = null)
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function getTotalQty()
    {
        return $this->expirationDates()->sum('qty');
    }
}
