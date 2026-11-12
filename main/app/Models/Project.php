<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'client', 'place', 'type', 'text', 'sort_order', 'is_active', 'is_featured'];

    protected $casts = ['is_active' => 'boolean', 'is_featured' => 'boolean'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function getCoverAttribute()
    {
        return $this->images->first()->path ?? null;
    }
}
