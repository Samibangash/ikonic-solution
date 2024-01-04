<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function product_feedback()
    {
        return $this->hasMany(ProductFeedback::class, 'product_id','id');
    }
}
