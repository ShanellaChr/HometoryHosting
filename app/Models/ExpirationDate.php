<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpirationDate extends Model
{
    protected $fillable = ['expiration_date', 'qty', 'user_id'];

    protected $dates = ['expiration_date'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
