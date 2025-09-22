<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PortfolioProject extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'client_name',
        'location',
        'project_value',
        'start_date',
        'completion_date',
        'technologies',
        'category_id',
        'is_active',
        'is_featured',
        'priority',
    ];

    protected $casts = [
        'start_date' => 'date',
        'completion_date' => 'date',
        'technologies' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'project_value' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Term::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('priority', 'asc')->orderBy('start_date', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $categorySlug)
    {
        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getDurationAttribute(): string
    {
        if (!$this->completion_date) {
            return 'Ongoing';
        }

        $start = $this->start_date->format('M Y');
        $end = $this->completion_date->format('M Y');

        return "{$start} - {$end}";
    }

    public function getFormattedValueAttribute(): string
    {
        return '$' . number_format($this->project_value, 0);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
