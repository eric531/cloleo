<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'old_price',
        'stock',
        'image',
        'type_product_id',
        'category_id',
        

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }  

    public function pub()
    {
        return $this->belongsTo(Pub::class);
    }

    public function type_product()
    {
        return $this->belongsTo(TypeProduct::class, 'type_product_id');
    }

}
