@extends('layouts.admin')

@section('title', 'Detail Magang - ' . $application->full_name)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-graduate"></i> Detail Pendaftaran Magang</h1>
    <div>
        <a href="{{ route('admin.internships.index') }}" class="btn btn-secondary">
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
                    @if($application->photo)
                    <div class="col-md-3 text-center mb-3">
                        <img src="{{ $application->photo_url }}" alt="Foto" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    @endif
                    <div class="col-md-{{ $application->photo ? '9' : '12' }}">
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

        <!-- Education Background -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">B. Latar Belakang Pendidikan</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Institusi</strong></td>
                        <td>: {{ $application->institution_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jurusan</strong></td>
                        <td>: {{ $application->major }}</td>
                    </tr>
                    <tr>
                        <td><strong>Semester</strong></td>
                        <td>: {{ $application->current_semester }}</td>
                    </tr>
                    <tr>
                        <td><strong>IPK</strong></td>
                        <td>: <span class="badge badge-{{ $application->gpa >= 3.5 ? 'success' : ($application->gpa >= 3.0 ? 'info' : 'warning') }}">{{ $application->gpa }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Tahun Masuk</strong></td>
                        <td>: {{ $application->entry_year }}</td>
                    </tr>
                    <tr>
                        <td><strong>Perkiraan Lulus</strong></td>
                        <td>: {{ $application->graduation_year }}</td>
                    </tr>
                    <tr>
                        <td><strong>Surat Pengantar</strong></td>
                        <td>: <a href="{{ $application->recommendation_letter_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download"></i> Download PDF
                        </a></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Internship Information -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">C. Informasi Magang</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Posisi Diminati</strong></td>
                        <td>: <span class="badge badge-primary">{{ $application->desired_position }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Tujuan Magang</strong></td>
                        <td>: {{ $application->internship_purpose }}</td>
                    </tr>
                    <tr>
                        <td><strong>Periode Magang</strong></td>
                        <td>: {{ $application->start_date->format('d M Y') }} - {{ $application->end_date->format('d M Y') }} ({{ $application->start_date->diffInDays($application->end_date) }} hari)</td>
                    </tr>
                    <tr>
                        <td><strong>Magang Wajib</strong></td>
                        <td>: {{ $application->is_mandatory }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ketersediaan</strong></td>
                        <td>: <span class="badge badge-secondary">{{ $application->availability }}</span></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Skills & Portfolio -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">D. Keahlian & Portofolio</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Keahlian:</strong>
                    <p class="mt-2">{{ $application->skills }}</p>
                </div>
                
                @if($application->portfolio_link)
                <div class="mb-3">
                    <strong>Link Portofolio:</strong>
                    <p class="mt-2"><a href="{{ $application->portfolio_link }}" target="_blank">{{ $application->portfolio_link }}</a></p>
                </div>
                @endif
                
                @if($application->project_experience)
                <div class="mb-3">
                    <strong>Pengalaman Proyek:</strong>
                    <p class="mt-2">{{ $application->project_experience }}</p>
                </div>
                @endif
                
                @if($application->project_file)
                <div>
                    <strong>File Proyek:</strong>
                    <p class="mt-2">
                        <a href="{{ $application->project_file_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-download"></i> Download File
                        </a>
                    </p>
                </div>
                @endif
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
                <form action="{{ route('admin.internships.update-status', $application->id) }}" method="POST">
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

        <!-- Application Info -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Informasi Pendaftaran</h5>
            </div>
            <div class="card-body">
                <p><strong>Tanggal Daftar:</strong><br>{{ $application->created_at->format('d F Y, H:i') }}</p>
                
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