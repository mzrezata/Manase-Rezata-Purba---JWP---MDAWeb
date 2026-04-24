<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InternshipApplication extends Model
{
    use HasFactory, SoftDeletes,Notifiable;

    protected $fillable = [
        'id',
        'full_name',
        'birth_place',
        'birth_date',
        'gender',
        'phone',
        'address',
        'email',
        'photo',
        'institution_name',
        'major',
        'current_semester',
        'gpa',
        'entry_year',
        'graduation_year',
        'recommendation_letter',
        'desired_position',
        'internship_purpose',
        'start_date',
        'end_date',
        'is_mandatory',
        'availability',
        'skills',
        'status',
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'gpa' => 'decimal:2',
        'reviewed_at' => 'datetime',
    ];

    public function getStatusBadgeAttribute(){
    $badges = [
        'pending' => '<span class="badge badge-warning">Pending</span>',
        'reviewed' => '<span class="badge badge-info">Reviewed</span>',
        'accepted' => '<span class="badge badge-success">Accepted</span>',
        'rejected' => '<span class="badge badge-danger">Rejected</span>',
    ];
    return $badges[$this->status] ?? '<span class="badge badge-secondary">Unknown</span>';
}

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

        public function logs()
    {
        return $this->hasMany(ApplicationLog::class, 'application_id')
                    ->where('application_type', 'internship')
                    ->orderBy('created_at', 'desc');
    }

        public function routeNotificationForMail()
    {
        return $this->email;
    }
}