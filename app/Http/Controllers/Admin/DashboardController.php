<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipApplication;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'internship_pending' => InternshipApplication::where('status', 'pending')->count(),
            'internship_total' => InternshipApplication::count(),
            'job_pending' => JobApplication::where('status', 'pending')->count(),
            'job_total' => JobApplication::count(),
        ];

        $recentInternships = InternshipApplication::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentJobs = JobApplication::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentInternships', 'recentJobs'));
    }
}