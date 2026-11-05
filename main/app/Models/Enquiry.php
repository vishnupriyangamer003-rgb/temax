<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'location', 'service', 'message', 'status', 'source',
    ];

    const STATUSES = [
        'new'     => 'New',
        'read'    => 'Read',
        'replied' => 'Replied',
        'closed'  => 'Closed',
    ];

    public function scopeUnread($query)
    {
        return $query->where('status', 'new');
    }

    public function getStatusLabelAttribute()
    {
        return self::STATUSES[$this->status] ?? ucfirst($this->status);
    }
}
