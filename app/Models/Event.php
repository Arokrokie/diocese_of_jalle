<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'start_date',
        'end_date',
        'description',
        'image',
        'contact_person',
        'is_featured',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
    ];

    public function isCompleted(): bool
    {
        $today = now()->startOfDay();
        $dateToCheck = $this->end_date ?? $this->start_date;
        return $dateToCheck ? $dateToCheck->startOfDay()->lt($today) : false;
    }

    public function isUpcoming(): bool
    {
        return !$this->isCompleted();
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->isCompleted() ? 'Completed' : 'Upcoming';
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return $this->isCompleted() ? 'bg-secondary' : 'bg-success';
    }
}
