<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    protected $fillable = ['service_id', 'icon', 'title', 'text', 'sort_order'];
}
