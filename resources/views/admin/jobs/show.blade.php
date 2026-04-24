@extends('layouts.admin')

@section('title', 'Detail Lamaran - ' . $application->full_name)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-briefcase"></i> Detail Lamaran Pekerjaan</h1>
    <div>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <!-- Left Column - Application Details -->
    <div class="col-md-8">
        <!-- Personal Information -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">A. Informasi Pribadi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-3">
                        <img src="{{ $application->photo_url }}" alt="Foto" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <td width="200"><strong>Nama Lengkap</strong></td>
                                <td>: {{ $application->full_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tempat, Tanggal Lahir</strong></td>
                                <td>: {{ $application->birth_place }}, {{ $application->birth_date->format('d F Y') }} ({{ $application->age }} tahun)</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin</strong></td>
                                <td>: {{ $application->gender }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status Pernikahan</strong></td>
                                <td>: {{ $application->marital_status }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>: {{ $application->address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Telepon / WhatsApp</strong></td>
                                <td>: <a href="https://wa.me/62{{ ltrim($application->phone, '0') }}" target="_blank">{{ $application->phone }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>: <a href="mailto:{{ $application->email }}">{{ $application->email }}</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education & Experience -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">B. Pendidikan & Pengalaman</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Pendidikan Terakhir</strong></td>
                        <td>: {{ $application->last_education }}</td>
                    </tr>
                    <tr>
                        <td><strong>Institusi</strong></td>
                        <td>: {{ $application->institution_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jurusan</strong></td>
                        <td>: {{ $application->major }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tahun Lulus</strong></td>
                        <td>: {{ $application->graduation_year }}</td>
                    </tr>
                </table>
                
                @if($application->work_experience)
                <div class="mt-3">
                    <strong>Pengalaman Kerja:</strong>
                    <p class="mt-2 pl-3">{{ $application->work_experience }}</p>
                </div>
                @endif
                
                @if($application->certifications)
                <div class="mt-3">
                    <strong>Sertifikasi:</strong>
                    <p class="mt-2 pl-3">{{ $application->certifications }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Application Information -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">C. Informasi Lamaran</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Posisi Dilamar</strong></td>
                        <td>: <span class="badge badge-primary badge-lg">{{ $application->applied_position }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Gaji yang Diharapkan</strong></td>
                        <td>: {{ $application->formatted_salary }}</td>
                    </tr>
                    <tr>
                        <td><strong>Dapat Mulai</strong></td>
                        <td>: {{ $application->available_from->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Bersedia Relokasi</strong></td>
                        <td>: <span class="badge badge-{{ $application->willing_to_relocate == 'Ya' ? 'success' : 'warning' }}">{{ $application->willing_to_relocate }}</span></td>
                    </tr>
                </table>
                
                <div class="mt-3">
                    <strong>Alasan Melamar:</strong>
                    <p class="mt-2 pl-3">{{ $application->reason_to_apply }}</p>
                </div>
            </div>
        </div>

        <!-- Skills & Portfolio -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">D. Keahlian & Portofolio</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Kemampuan Teknis:</strong>
                    <p class="mt-2">{{ $application->technical_skills }}</p>
                </div>
                
                <div class="mb-3">
                    <strong>Soft Skills:</strong>
                    <p class="mt-2">{{ $application->soft_skills }}</p>
                </div>
                
                @if($application->portfolio_link)
                <div class="mb-3">
                    <strong>Link Portofolio:</strong>
                    <p class="mt-2"><a href="{{ $application->portfolio_link }}" target="_blank">{{ $application->portfolio_link }}</a></p>
                </div>
                @endif
                
                <div class="mb-3">
                    <strong>CV / Resume:</strong>
                    <p class="mt-2">
                        <a href="{{ $application->cv_file_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    </p>
                </div>
                
                <div>
                    <strong>Surat Lamaran:</strong>
                    <p class="mt-2">
                        <a href="{{ $application->cover_letter_file_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download"></i> Download Surat Lamaran
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column - Actions & Status -->
    <div class="col-md-4">
        <!-- Status Card -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Status & Aksi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jobs.update-status', $application->id) }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label><strong>Status Saat Ini:</strong></label>
                        <div>{!! $application->status_badge !!}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="status"><strong>Ubah Status:</strong></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="interview" {{ $application->status == 'interview' ? 'selected' : '' }}>Interview</option>
                            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Diterima</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="admin_notes"><strong>Catatan Admin:</strong></label>
                        <textarea name="admin_notes" id="admin_notes" class="form-control" rows="4" placeholder="Tambahkan catatan...">{{ $application->admin_notes }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save"></i> Update Status
                    </button>
                </form>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="mailto:{{ $application->email }}" class="btn btn-outline-primary btn-block mb-2">
                    <i class="fas fa-envelope"></i> Kirim Email
                </a>
                <a href="https://wa.me/62{{ ltrim($application->phone, '0') }}" target="_blank" class="btn btn-outline-success btn-block mb-2">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="{{ $application->cv_file_url }}" target="_blank" class="btn btn-outline-info btn-block mb-2">
                    <i class="fas fa-file-pdf"></i> Lihat CV
                </a>
                <a href="{{ $application->cover_letter_file_url }}" target="_blank" class="btn btn-outline-warning btn-block">
                    <i class="fas fa-file-alt"></i> Lihat Surat Lamaran
                </a>
            </div>
        </div>

        <!-- Application Info -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Informasi Lamaran</h5>
            </div>
            <div class="card-body">
                <p><strong>Tanggal Lamar:</strong><br>{{ $application->created_at->format('d F Y, H:i') }}</p>
                
                @if($application->reviewed_at)
                <p><strong>Direview Oleh:</strong><br>{{ $application->reviewer->name }}</p>
                <p><strong>Tanggal Review:</strong><br>{{ $application->reviewed_at->format('d F Y, H:i') }}</p>
                @endif
            </div>
        </div>

        <!-- Activity Log -->
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Riwayat Aktivitas</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($application->logs as $log)
                        <div class="list-group-item">
                            <small class="text-muted">{{ $log->created_at->format('d M Y, H:i') }}</small>
                            <p class="mb-0">{{ $log->description }}</p>
                            @if($log->user)
                                <small>oleh: {{ $log->user->name }}</small>
                            @endif
                        </div>
                    @empty
                        <div class="list-group-item text-center text-muted">
                            Belum ada aktivitas
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection