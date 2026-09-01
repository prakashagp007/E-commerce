<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     protected $fillable = [

        'name',
        'slug',
        'price',
        'qty',
        'image',
        'description',
        'status'
    ];
    // app/Models/Product.php - relationship add pannunga
public function category()
{
    return $this->belongsTo(Category::class);
}
}
