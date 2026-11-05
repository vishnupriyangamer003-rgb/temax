<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    protected $fillable = ['product_category_id', 'name', 'description', 'sort_order'];
}
