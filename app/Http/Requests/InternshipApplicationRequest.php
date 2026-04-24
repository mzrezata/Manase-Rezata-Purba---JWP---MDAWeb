<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipApplicationRequest extends FormRequest
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
            'email' => 'required|email|unique:internship_applications,email',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            
            // B. Latar Belakang Pendidikan
            'institution_name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'current_semester' => 'required|integer|min:1|max:14',
            'gpa' => 'required|numeric|min:0|max:4',
            'entry_year' => 'required|integer|min:2015|max:2025',
            'graduation_year' => 'required|integer|min:2024|max:2030',
            'recommendation_letter' => 'required|file|mimes:pdf|max:5120',
            
            // C. Informasi Magang
            'desired_position' => 'required|string|max:255',
            'internship_purpose' => 'required|string',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'is_mandatory' => 'required|in:Ya,Tidak',
            'availability' => 'required|in:Full-time,Part-time,Hybrid',
            
            // D. Keahlian & Portofolio
            'skills' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Nama lengkap wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'gpa.max' => 'IPK maksimal 4.00',
            'recommendation_letter.required' => 'Surat pengantar wajib diupload',
            'start_date.after' => 'Tanggal mulai harus setelah hari ini',
            'end_date.after' => 'Tanggal selesai harus setelah tanggal mulai',
        ];
    }
}