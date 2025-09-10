<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'position',
        'description',
        'responsibilities',
        'location',
        'employment_type',
        'start_date',
        'end_date',
        'is_current',
        'is_active',
        'priority',
        'achievements',
        'technologies',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_active' => 'boolean',
        'achievements' => 'array',
        'technologies' => 'array',
    ];

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

    public function getFormattedDurationAttribute()
    {
        $start = $this->start_date->format('M Y');
        $end = $this->is_current ? 'Present' : ($this->end_date ? $this->end_date->format('M Y') : 'Present');

        return "{$start} - {$end}";
    }

    public function getDurationInMonthsAttribute()
    {
        $startDate = $this->start_date;
        $endDate = $this->is_current ? now() : $this->end_date;

        return $startDate->diffInMonths($endDate);
    }
}
