<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'title', 'icon', 'image', 'summary', 'badge', 'banner',
        'items_title', 'cta_title', 'lead', 'intro',
        'image_a', 'image_b', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'intro' => 'array',
        'is_active' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(ServiceItem::class)->orderBy('sort_order')->orderBy('id');
    }

    public function steps()
    {
        return $this->hasMany(ServiceStep::class)->orderBy('sort_order')->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
