<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\category; 

class product extends Model
{
    protected $table = 'product'; // table name
    protected $fillable = ['name','price','category_id','description','features','product_img'];

    
    // Define the relationship: product belongs to a category
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
