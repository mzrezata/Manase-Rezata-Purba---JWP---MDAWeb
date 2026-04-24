<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user profile page
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

     public function showApplicationDetail($type, $id)
    {
        $user = Auth::user();
        
        // Validasi type
        if (!in_array($type, ['job', 'internship'])) {
            abort(404, 'Application type not found');
        }
        
        // Fetch application berdasarkan type
        if ($type === 'job') {
            $application = JobApplication::where('id', $id)
                ->where('email', $user->email) // Pastikan milik user ini
                ->first();
                
            if (!$application) {
                abort(404, 'Job application not found or you do not have access');
            }
            
            $applicationType = 'Lamaran Pekerjaan';
            
        } else { // internship
            $application = InternshipApplication::where('id', $id)
                ->where('email', $user->email) // Pastikan milik user ini
                ->first();
                
            if (!$application) {
                abort(404, 'Internship application not found or you do not have access');
            }
            
            $applicationType = 'Lamaran Magang';
        }
        
        // Get reviewer info if exists
        $reviewer = null;
        if ($application->reviewed_by) {
            $reviewer = \App\Models\User::find($application->reviewed_by);
        }
        
        return view('profile.application-detail', compact('application', 'type', 'applicationType', 'reviewer'));
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diupdate!');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('admin.profile.index')->with('success', 'Password berhasil diubah!');
    }

    /**
     * Delete avatar
     */
    public function deleteAvatar()
    {
        $user = Auth::user();

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
            $user->update(['avatar' => null]);
        }

        return redirect()->route('admin.profile.index')->with('success', 'Avatar berhasil dihapus!');
    }
}