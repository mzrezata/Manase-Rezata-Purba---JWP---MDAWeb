@extends('layouts.app')

@section('title', 'Detail ' . $applicationType)

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('profile') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Profile
        </a>
    </div>
    
    <!-- Header Card -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <div class="flex justify-between items-start">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="px-3 py-1 text-sm font-semibold rounded {{ $type === 'job' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                        {{ $type === 'job' ? 'Pekerjaan' : 'Magang' }}
                    </span>
                    <h1 class="text-2xl font-bold text-gray-900">
                        {{ $type === 'job' ? $application->applied_position : $application->desired_position }}
                    </h1>
                </div>
                <p class="text-gray-600">Application ID: #{{ $application->id }}</p>
                <p class="text-gray-600">Diajukan: {{ $application->created_at->format('d F Y, H:i') }}</p>
            </div>
            
            <!-- Status Badge -->
            <div>
                @php
                    $statusConfig = [
                        'pending' => ['color' => 'bg-yellow-100 text-yellow-800 border-yellow-300', 'label' => 'Menunggu Review'],
                        'reviewed' => ['color' => 'bg-blue-100 text-blue-800 border-blue-300', 'label' => 'Sedang Direview'],
                        'interview' => ['color' => 'bg-purple-100 text-purple-800 border-purple-300', 'label' => 'Undangan Interview'],
                        'accepted' => ['color' => 'bg-green-100 text-green-800 border-green-300', 'label' => 'Diterima'],
                        'rejected' => ['color' => 'bg-red-100 text-red-800 border-red-300', 'label' => 'Ditolak'],
                    ];
                    $status = $statusConfig[$application->status] ?? ['color' => 'bg-gray-100 text-gray-800', 'label' => $application->status];
                @endphp
                <div class="px-4 py-2 rounded-lg border-2 {{ $status['color'] }} font-bold text-lg text-center">
                    {{ $status['label'] }}
                </div>
                
                @if($application->reviewed_at)
                    <p class="text-sm text-gray-600 mt-2 text-right">
                        Direview: {{ $application->reviewed_at->format('d M Y, H:i') }}
                    </p>
                @endif
            </div>
        </div>
        
        <!-- Status Description -->
        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
            @if($application->status === 'pending')
                <p class="text-gray-700">
                    ⏳ Lamaran Anda sedang menunggu untuk direview oleh tim HR. Kami akan segera menghubungi Anda.
                </p>
            @elseif($application->status === 'reviewed')
                <p class="text-gray-700">
                    👀 Lamaran Anda sedang dalam proses review oleh tim HR. Mohon tunggu informasi selanjutnya.
                </p>
            @elseif($application->status === 'interview')
                <p class="text-gray-700">
                    🎉 Selamat! Anda dipanggil untuk interview. Tim kami akan menghubungi Anda untuk jadwal interview.
                </p>
            @elseif($application->status === 'accepted')
                <p class="text-gray-700">
                    ✅ Selamat! Lamaran Anda diterima. Tim HR akan menghubungi Anda untuk proses selanjutnya.
                </p>
            @elseif($application->status === 'rejected')
                <p class="text-gray-700">
                    😔 Maaf, lamaran Anda belum sesuai dengan kebutuhan kami saat ini. Terima kasih atas minat Anda.
                </p>
            @endif
        </div>
        
        <!-- Admin Notes -->
        @if($application->admin_notes)
            <div class="mt-4 p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                <h3 class="font-semibold text-blue-900 mb-2">📝 Catatan dari Tim HR:</h3>
                <p class="text-gray-700">{{ $application->admin_notes }}</p>
            </div>
        @endif
        
        <!-- Reviewer Info -->
        @if($reviewer)
            <div class="mt-4 text-sm text-gray-600">
                Direview oleh: <span class="font-semibold">{{ $reviewer->name }}</span> ({{ $reviewer->role }})
            </div>
        @endif
    </div>
    
    <!-- Application Data -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Personal Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">A. Informasi Pribadi</h2>
            <div class="space-y-3">
                <div>
                    <label class="text-sm text-gray-600">Nama Lengkap</label>
                    <p class="font-medium">{{ $application->full_name }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">Tempat Lahir</label>
                        <p class="font-medium">{{ $application->birth_place }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Tanggal Lahir</label>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($application->birth_date)->format('d F Y') }}</p>
                    </div>
                </div>
                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <p class="font-medium">{{ $application->gender }}</p>
                </div>
                @if($type === 'job')
                    <div>
                        <label class="text-sm text-gray-600">Status Pernikahan</label>
                        <p class="font-medium">{{ $application->marital_status }}</p>
                    </div>
                @endif
                <div>
                    <label class="text-sm text-gray-600">Alamat</label>
                    <p class="font-medium">{{ $application->address }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">Telepon</label>
                        <p class="font-medium">{{ $application->phone }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Email</label>
                        <p class="font-medium">{{ $application->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Education -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">B. Pendidikan</h2>
            <div class="space-y-3">
                @if($type === 'job')
                    <div>
                        <label class="text-sm text-gray-600">Pendidikan Terakhir</label>
                        <p class="font-medium">{{ $application->last_education }}</p>
                    </div>
                @else
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-gray-600">Semester</label>
                            <p class="font-medium">{{ $application->current_semester }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">IPK</label>
                            <p class="font-medium">{{ number_format($application->gpa, 2) }}</p>
                        </div>
                    </div>
                @endif
                <div>
                    <label class="text-sm text-gray-600">Institusi</label>
                    <p class="font-medium">{{ $application->institution_name }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-600">Jurusan</label>
                    <p class="font-medium">{{ $application->major }}</p>
                </div>
                <div>
                    <label class="text-sm text-gray-600">Tahun Lulus</label>
                    <p class="font-medium">{{ $application->graduation_year }}</p>
                </div>
                
                @if($type === 'job' && $application->work_experience)
                    <div>
                        <label class="text-sm text-gray-600">Pengalaman Kerja</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->work_experience }}</p>
                    </div>
                @endif
                
                @if($type === 'job' && $application->certifications)
                    <div>
                        <label class="text-sm text-gray-600">Sertifikasi</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->certifications }}</p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Application Info / Internship Info -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">
                C. {{ $type === 'job' ? 'Informasi Lamaran' : 'Informasi Magang' }}
            </h2>
            <div class="space-y-3">
                @if($type === 'job')
                    <div>
                        <label class="text-sm text-gray-600">Posisi yang Dilamar</label>
                        <p class="font-medium">{{ $application->applied_position }}</p>
                    </div>
                    @if($application->expected_salary)
                        <div>
                            <label class="text-sm text-gray-600">Gaji yang Diharapkan</label>
                            <p class="font-medium">Rp {{ number_format($application->expected_salary, 0, ',', '.') }}</p>
                        </div>
                    @endif
                    <div>
                        <label class="text-sm text-gray-600">Bisa Mulai Kerja</label>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($application->available_from)->format('d F Y') }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Bersedia Relokasi</label>
                        <p class="font-medium">{{ $application->willing_to_relocate }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Alasan Melamar</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->reason_to_apply }}</p>
                    </div>
                @else
                    <div>
                        <label class="text-sm text-gray-600">Posisi Magang</label>
                        <p class="font-medium">{{ $application->desired_position }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Tujuan Magang</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->internship_purpose }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-gray-600">Tanggal Mulai</label>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($application->start_date)->format('d F Y') }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">Tanggal Selesai</label>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($application->end_date)->format('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-gray-600">Magang Wajib</label>
                            <p class="font-medium">{{ $application->is_mandatory }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">Ketersediaan</label>
                            <p class="font-medium">{{ $application->availability }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Skills -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">D. Keahlian</h2>
            <div class="space-y-3">
                @if($type === 'job')
                    <div>
                        <label class="text-sm text-gray-600">Technical Skills</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->technical_skills }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Soft Skills</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->soft_skills }}</p>
                    </div>
                    @if($application->portfolio_link)
                        <div>
                            <label class="text-sm text-gray-600">Portfolio</label>
                            <a href="{{ $application->portfolio_link }}" target="_blank" class="font-medium text-blue-600 hover:underline">
                                {{ $application->portfolio_link }}
                            </a>
                        </div>
                    @endif
                @else
                    <div>
                        <label class="text-sm text-gray-600">Skills</label>
                        <p class="font-medium whitespace-pre-line">{{ $application->skills }}</p>
                    </div>
                @endif
            </div>
        </div>
        
    </div>
    
    <!-- Documents Section -->
    <div class="bg-white rounded-lg shadow p-6 mt-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">📎 Dokumen Lamaran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if($application->photo)
                <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Foto</p>
                            <p class="text-sm text-gray-600">JPG/PNG</p>
                        </div>
                        <a href="{{ asset('storage/' . $application->photo) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
            
            @if($type === 'job')
                <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">CV / Resume</p>
                            <p class="text-sm text-gray-600">PDF</p>
                        </div>
                        <a href="{{ asset('storage/' . $application->cv_file) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Cover Letter</p>
                            <p class="text-sm text-gray-600">PDF</p>
                        </div>
                        <a href="{{ asset('storage/' . $application->cover_letter_file) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @else
                <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Surat Rekomendasi</p>
                            <p class="text-sm text-gray-600">PDF</p>
                        </div>
                        <a href="{{ asset('storage/' . $application->recommendation_letter) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
</div>
@endsection