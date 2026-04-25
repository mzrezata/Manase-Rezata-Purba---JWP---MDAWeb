<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index(Request $request)
    {
        $query = JobVacancy::query();

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        $vacancies = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.job_vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('admin.job_vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'location'        => 'required|string|max:255',
            'job_type'        => 'required|in:Full-time,Part-time,Contract,Freelance',
            'work_type'       => 'required|in:On-site,Hybrid,Remote',
            'color_gradient'  => 'required|string',
            'description'     => 'required|string',
            'qualifications'  => 'required|string',
            'is_active'       => 'nullable',
        ], [
            'title.required'          => 'Judul posisi wajib diisi.',
            'location.required'       => 'Lokasi wajib diisi.',
            'job_type.required'       => 'Tipe pekerjaan wajib dipilih.',
            'work_type.required'      => 'Tipe kerja wajib dipilih.',
            'color_gradient.required' => 'Warna card wajib dipilih.',
            'description.required'    => 'Deskripsi wajib diisi.',
            'qualifications.required' => 'Kualifikasi wajib diisi.',
        ]);

        JobVacancy::create([
            'title'          => $request->title,
            'location'       => $request->location,
            'job_type'       => $request->job_type,
            'work_type'      => $request->work_type,
            'color_gradient' => $request->color_gradient,
            'description'    => $request->description,
            'qualifications' => $request->qualifications,
            'is_active'      => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.job_vacancies.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(JobVacancy $jobVacancy)
    {
        return view('admin.job_vacancies.edit', compact('jobVacancy'));
    }

    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'location'        => 'required|string|max:255',
            'job_type'        => 'required|in:Full-time,Part-time,Contract,Freelance',
            'work_type'       => 'required|in:On-site,Hybrid,Remote',
            'color_gradient'  => 'required|string',
            'description'     => 'required|string',
            'qualifications'  => 'required|string',
            'is_active'       => 'nullable',
        ]);

        $jobVacancy->update([
            'title'          => $request->title,
            'location'       => $request->location,
            'job_type'       => $request->job_type,
            'work_type'      => $request->work_type,
            'color_gradient' => $request->color_gradient,
            'description'    => $request->description,
            'qualifications' => $request->qualifications,
            'is_active'      => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.job_vacancies.index')
            ->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->delete();

        return redirect()->route('admin.job_vacancies.index')
            ->with('success', 'Lowongan berhasil dihapus.');
    }
}