<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // A. Informasi Pribadi
            'full_name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:job_applications,email',
            'marital_status' => 'required|in:Belum Menikah,Menikah,Cerai',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            
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
            'available_from' => 'required|date|after_or_equal:today',
            'reason_to_apply' => 'required|string',
            'willing_to_relocate' => 'required|in:Ya,Tidak',
            
            // D. Keahlian & Portofolio
            'technical_skills' => 'required|string',
            'soft_skills' => 'required|string',
            'portfolio_link' => 'nullable|url',
            'cv_file' => 'required|file|mimes:pdf|max:5120',
            'cover_letter_file' => 'required|file|mimes:pdf|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Nama lengkap wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'photo.required' => 'Foto diri wajib diupload',
            'cv_file.required' => 'CV wajib diupload',
            'cover_letter_file.required' => 'Surat lamaran wajib diupload',
            'available_from.after_or_equal' => 'Tanggal mulai minimal hari ini',
        ];
    }
}
