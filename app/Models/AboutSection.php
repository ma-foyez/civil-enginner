<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'full_description',
        'skills',
        'specializations',
        'years_of_experience',
        'projects_completed',
        'happy_clients',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'skills' => 'array',
        'specializations' => 'array',
        'is_active' => 'boolean',
        'years_of_experience' => 'integer',
        'projects_completed' => 'integer',
        'happy_clients' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('priority', 'asc')->orderBy('created_at', 'desc');
    }
}
