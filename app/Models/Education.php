<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'institution_name',
        'degree',
        'field_of_study',
        'description',
        'location',
        'gpa',
        'start_date',
        'end_date',
        'is_current',
        'achievements',
        'courses',
        'certificate_id',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_active' => 'boolean',
        'achievements' => 'array',
        'courses' => 'array',
        'gpa' => 'decimal:2',
    ];

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'certificate_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('priority', 'asc')->orderBy('start_date', 'desc');
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }

    public function getDurationAttribute(): string
    {
        $start = $this->start_date->format('M Y');
        $end = $this->is_current ? 'Present' : $this->end_date->format('M Y');

        return "{$start} - {$end}";
    }
}
