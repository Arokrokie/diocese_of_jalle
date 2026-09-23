<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
        'caption',
        'event_date',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];
}
