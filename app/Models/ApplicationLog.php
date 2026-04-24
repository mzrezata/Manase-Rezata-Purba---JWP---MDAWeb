<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplication;

class ApplicationLog extends Model
{
    protected $fillable = [
        'application_type',
        'application_id',
        'action',
        'description',
        'user_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->morphTo();
    }

    // Helper method
    public static function log($applicationType, $applicationId, $action, $description = null, $userId = null)
    {
        return static::create([
            'application_type' => $applicationType,
            'application_id' => $applicationId,
            'action' => $action,
            'description' => $description,
            'user_id' => $userId ?? auth()->id(),
        ]);
    }
}