<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $fillable = [
        'title',
        'location',
        'job_type',
        'work_type',
        'color_gradient',
        'description',
        'qualifications',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Qualifications sebagai array (dipisah newline)
     */
    public function getQualificationsArrayAttribute()
    {
        return array_filter(explode("\n", $this->qualifications));
    }

    /**
     * Scope hanya yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}