<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'user_id', // ✅ TAMBAHKAN INI
        'full_name', 'email', 'phone', 'address', 
        'birth_place', 'birth_date', 'gender', 'marital_status',
        'last_education', 'graduation_year', 'institution_name', 'major',
        'work_experience', 'certifications',
        'applied_position', 'expected_salary', 'available_from', 
        'willing_to_relocate', 'reason_to_apply',
        'technical_skills', 'soft_skills', 'portfolio_link',
        'photo', 'cv_file', 'cover_letter_file',
        'status', 'admin_notes', 'reviewed_at', 'reviewed_by', 'interview_date'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'available_from' => 'date',
        'interview_date' => 'date',
        'expected_salary' => 'decimal:2',
        'reviewed_at' => 'datetime',
        'work_experience' => 'array', // ✅ TAMBAHKAN INI jika work_experience adalah JSON
    ];

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="badge badge-warning">Pending</span>',
            'reviewed' => '<span class="badge badge-info">Reviewed</span>',
            'interview' => '<span class="badge badge-primary">Interview</span>',
            'accepted' => '<span class="badge badge-success">Accepted</span>',
            'rejected' => '<span class="badge badge-danger">Rejected</span>',
        ];
        
        return $badges[$this->status] ?? '<span class="badge badge-secondary">Unknown</span>';
    }

    // ✅ PERBAIKI RELASI INI
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function logs()
    {
        return $this->hasMany(ApplicationLog::class, 'application_id')
                    ->where('application_type', 'job')
                    ->orderBy('created_at', 'desc');
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }
}