<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sermon extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'preacher',
        'scripture',
        'sermon_date',
        'description',
        'notes',
        'audio_url',
        'video_url',
        'image',
    ];

    protected $casts = [
        'sermon_date' => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($sermon) {
            if (empty($sermon->slug)) {
                $sermon->slug = Str::slug($sermon->title) . '-' . Str::random(5);
            }
        });
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        return asset('assets/img/diocese/bishop-preaching.jpeg');
    }
}
