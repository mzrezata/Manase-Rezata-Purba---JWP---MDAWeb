<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class InternshipApplicationController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'birth_place' => 'required|string|max:255',
                'birth_date' => 'required|date|before:today',
                'gender' => 'required|in:Laki-laki,Perempuan',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
                'email' => 'required|email|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'institution_name' => 'required|string|max:255',
                'major' => 'required|string|max:255',
                'current_semester' => 'required|integer|min:1|max:14',
                'gpa' => 'required|numeric|min:0|max:4',
                'entry_year' => 'required|integer|min:2015|max:2025',
                'graduation_year' => 'required|integer|min:2024|max:2030',
                'recommendation_letter' => 'required|file|mimes:pdf|max:10240',
                'desired_position' => 'required|string|max:255',
                'internship_purpose' => 'required|string',
                'start_date' => 'required|date|after:today',
                'end_date' => 'required|date|after:start_date',
                'is_mandatory' => 'required|in:Ya,Tidak',
                'availability' => 'required|in:Full-time,Part-time,Hybrid',
                'skills' => 'required|string',
            ]);

            // Upload files
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('internships/photos', 'public');
            }

            $letterPath = $request->file('recommendation_letter')->store('internships/letters', 'public');

            // Simpan ke database
            $internship = InternshipApplication::create([
                'full_name' => $validated['full_name'],
                'birth_place' => $validated['birth_place'],
                'birth_date' => $validated['birth_date'],
                'gender' => $validated['gender'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'email' => $validated['email'],
                'photo' => $photoPath,
                'institution_name' => $validated['institution_name'],
                'major' => $validated['major'],
                'current_semester' => $validated['current_semester'],
                'gpa' => $validated['gpa'],
                'entry_year' => $validated['entry_year'],
                'graduation_year' => $validated['graduation_year'],
                'recommendation_letter' => $letterPath,
                'desired_position' => $validated['desired_position'],
                'internship_purpose' => $validated['internship_purpose'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'is_mandatory' => $validated['is_mandatory'],
                'availability' => $validated['availability'],
                'skills' => $validated['skills'],
                'status' => 'pending',
            ]);

            Log::info('Internship application saved successfully', [
                'id' => $internship->id,
                'email' => $internship->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran magang berhasil dikirim!',
                'data' => $internship
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Internship application error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Cleanup file yang sudah diupload jika terjadi error
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }
            if (isset($letterPath)) {
                Storage::disk('public')->delete($letterPath);
            }

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}