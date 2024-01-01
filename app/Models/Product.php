<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = 
    [
        'name', 'users_id', 'categories_id', 'price', 'description', 'slug'
    ];

    protected $hidden = 
    [
    ];

    // Relations
    public function galleries()
    {
        // Bisa banyak foto
        // return $this->hasMany(ProductGallery::class, 'products_id', 'id')->withTrashed();  gambil data terhapus
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user()
    {
        // Hanya satu user, tpi banyak product
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category()
    {
        // Hanya satu kategory setiap product
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}