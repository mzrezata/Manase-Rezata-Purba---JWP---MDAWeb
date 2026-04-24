<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input - SESUAI DENGAN NAMA FIELD DI FORM HTML
            $validated = $request->validate([
                // A. Informasi Pribadi
                'full_name' => 'required|string|max:255',
                'birth_place' => 'required|string|max:255',
                'birth_date' => 'required|date|before:today',
                'gender' => 'required|in:Laki-laki,Perempuan',
                'marital_status' => 'required|in:Belum Menikah,Menikah,Cerai',
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                
                // B. Pendidikan & Pengalaman
                'last_education' => 'required|string|max:255',
                'institution_name' => 'required|string|max:255',
                'major' => 'required|string|max:255',
                'graduation_year' => 'required|integer|min:1990|max:2025',
                'work_experience' => 'nullable|string',
                'certifications' => 'nullable|string',
                
                // C. Informasi Lamaran
                'applied_position' => 'required|string|max:255',
                'expected_salary' => 'nullable|numeric|min:0',
                'available_from' => 'required|date|after:today',
                'reason_to_apply' => 'required|string',
                'willing_to_relocate' => 'required|in:Ya,Tidak',
                
                // D. Keahlian & Portofolio
                'technical_skills' => 'required|string',
                'soft_skills' => 'required|string',
                'portfolio_link' => 'nullable|url',
                'cv_file' => 'required|file|mimes:pdf|max:10240',
                'cover_letter_file' => 'required|file|mimes:pdf|max:10240',
            ]);

            // Upload files
            $photoPath = $request->file('photo')->store('jobs/photos', 'public');
            $cvPath = $request->file('cv_file')->store('jobs/cvs', 'public');
            $coverLetterPath = $request->file('cover_letter_file')->store('jobs/cover-letters', 'public');

            // Simpan ke database
            $application = JobApplication::create([
                // A. Informasi Pribadi
                'full_name' => $validated['full_name'],
                'birth_place' => $validated['birth_place'],
                'birth_date' => $validated['birth_date'],
                'gender' => $validated['gender'],
                'marital_status' => $validated['marital_status'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'photo' => $photoPath,
                
                // B. Pendidikan & Pengalaman
                'last_education' => $validated['last_education'],
                'institution_name' => $validated['institution_name'],
                'major' => $validated['major'],
                'graduation_year' => $validated['graduation_year'],
                'work_experience' => $validated['work_experience'] ?? null,
                'certifications' => $validated['certifications'] ?? null,
                
                // C. Informasi Lamaran
                'applied_position' => $validated['applied_position'],
                'expected_salary' => $validated['expected_salary'] ?? null,
                'available_from' => $validated['available_from'],
                'reason_to_apply' => $validated['reason_to_apply'],
                'willing_to_relocate' => $validated['willing_to_relocate'],
                
                // D. Keahlian & Portofolio
                'technical_skills' => $validated['technical_skills'],
                'soft_skills' => $validated['soft_skills'],
                'portfolio_link' => $validated['portfolio_link'] ?? null,
                'cv_file' => $cvPath,
                'cover_letter_file' => $coverLetterPath,
                
                // Status
                'status' => 'pending',
            ]);

            Log::info('Job application saved successfully', [
                'id' => $application->id,
                'email' => $application->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Lamaran pekerjaan berhasil dikirim!',
                'data' => $application
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Job application error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            // Cleanup file yang sudah diupload jika terjadi error
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }
            if (isset($cvPath)) {
                Storage::disk('public')->delete($cvPath);
            }
            if (isset($coverLetterPath)) {
                Storage::disk('public')->delete($coverLetterPath);
            }

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}