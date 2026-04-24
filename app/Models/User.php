<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar', 'phone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships
    public function reviewedInternships()
    {
        return $this->hasMany(InternshipApplication::class, 'reviewed_by');
    }

    public function reviewedJobs()
    {
        return $this->hasMany(JobApplication::class, 'reviewed_by');
    }

    public function logs()
    {
        return $this->hasMany(ApplicationLog::class);
    }

    // Helper methods
    public function isSuperAdmin()
    {
        return $this->role === 'superadmin';
    }

    public function isHR()
    {
        return $this->role === 'hr' || $this->role === 'superadmin';
    }

    public function isAdmin()
    {
        return $this->role === 'admin' || $this->role === 'superadmin';
    }

    public function isVisitor()
    {
        return $this->role === 'visitor';
    }

    public function canAccessAdmin()
    {
        return in_array($this->role, ['hr', 'admin', 'superadmin']);
    }

    // Get avatar URL
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        
        // Default avatar with initials
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=fff&background=dc3545&size=200';
    }

    // Get role badge
    public function getRoleBadgeAttribute()
    {
        $badges = [
            'hr' => '<span class="badge badge-info">HR</span>',
            'admin' => '<span class="badge badge-primary">Admin</span>',
            'superadmin' => '<span class="badge badge-danger">Super Admin</span>',
        ];

        return $badges[$this->role] ?? '<span class="badge badge-secondary">User</span>';
    }
}