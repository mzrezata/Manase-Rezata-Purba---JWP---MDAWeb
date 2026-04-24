<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\InternshipApplication;   
class HomeController extends Controller
{
    /**
     * Show homepage
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show services page
     */
    public function services()
    {
        return view('services');
    }

    /**
     * Show career page
     */
    public function career()
    {
        return view('career');
    }

    /**
     * Show about page
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show profile page
     * - If not logged in: show login/register
     * - If logged in: show user profile
     */

    public function profile()
{
    if (Auth::check()) {
        $user = Auth::user();
        
        // Fetch lamaran user
        $jobApplications = JobApplication::where('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();
            
        $internshipApplications = InternshipApplication::where('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Gabungkan dan sort by date
        $allApplications = collect()
            ->merge($jobApplications->map(fn($app) => [
                'id' => $app->id,
                'type' => 'job',
                'position' => $app->applied_position,
                'status' => $app->status,
                'created_at' => $app->created_at,
            ]))
            ->merge($internshipApplications->map(fn($app) => [
                'id' => $app->id,
                'type' => 'internship',
                'position' => $app->desired_position,
                'status' => $app->status,
                'created_at' => $app->created_at,
            ]))
            ->sortByDesc('created_at');
        
        // Hitung statistik
        $stats = [
            'total' => $allApplications->count(),
            'pending' => $allApplications->where('status', 'pending')->count(),
            'reviewed' => $allApplications->where('status', 'reviewed')->count(),
            'interview' => $allApplications->where('status', 'interview')->count(),
            'accepted' => $allApplications->where('status', 'accepted')->count(),
            'rejected' => $allApplications->where('status', 'rejected')->count(),
        ];
        
        return view('profile.show', compact('user', 'allApplications', 'stats'));
    }
    
    return view('profile.auth');
}

}