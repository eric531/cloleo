<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pub extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'link',
        'category_id',
        // 'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
