<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'admin_id',
        'created_at',
        'updated_at',
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}