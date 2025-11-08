<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.dashboard')]
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'is_featured',
        'is_published',
        'published_at',
        'author_id',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Relation till författare
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Auto-generate slug från titel
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }

            // Sätt default bild
            if (empty($news->featured_image)) {
                $news->featured_image = 'https://isc-uddevalla.se/wp-content/uploads/2025/11/news-alert-announcement-broadcast-article-concept-scaled.jpg';
            }
        });
    }

    // Scope för publicerade nyheter
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    // Scope för featured nyheter
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
