<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product; 

class category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_image', 'category'];

    // Define the relationship: category has many products
    public function products()
    {
        return $this->hasMany(product::class, 'category', 'id');
    }
}
