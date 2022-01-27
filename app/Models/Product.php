<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quantity', 'price', 'sale_price', 'status', 'features', 'category_id', 'product_id'];
    public function productImages()
    {
        return $this->hasMany(Product_images::class, 'products_id', 'id');
    }
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'products_id', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
}
