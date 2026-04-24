<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipApplication;
use App\Models\ApplicationLog;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = InternshipApplication::with('reviewer');
        
        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('desired_position', 'like', "%{$search}%");
            });
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Filter by position
        if ($request->has('position') && $request->position != '') {
            $query->where('desired_position', $request->position);
        }
        
        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $applications = $query->paginate(20);
        
        return view('admin.internships.index', compact('applications'));
    }

    public function show($id)
    {
        $application = InternshipApplication::with(['reviewer', 'logs.user'])->findOrFail($id);
        return view('admin.internships.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,accepted,rejected',
            'admin_notes' => 'nullable|string',
        ]);
        
        $application = InternshipApplication::findOrFail($id);
        $oldStatus = $application->status;
        
        $application->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);
        
        // Log activity
        ApplicationLog::log(
            'internship',
            $application->id,
            'status_changed',
            "Status diubah dari {$oldStatus} ke {$request->status}"
        );
        
        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id)
    {
        $application = InternshipApplication::findOrFail($id);
        
        // Log before delete
        ApplicationLog::log('internship', $application->id, 'deleted', 'Aplikasi dihapus');
        
        $application->delete();
        
        return redirect()->route('admin.internships.index')->with('success', 'Data berhasil dihapus');
    }
}