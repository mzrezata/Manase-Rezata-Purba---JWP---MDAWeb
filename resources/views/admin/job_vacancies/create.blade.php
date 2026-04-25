@extends('layouts.admin')

@section('title', 'Tambah Lowongan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-plus-circle"></i> Tambah Lowongan</h1>
    <a href="{{ route('admin.job_vacancies.index') }}" class="btn btn-sm btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-clipboard-list"></i> Form Tambah Lowongan</h5>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.job_vacancies.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label><i class="fas fa-briefcase"></i> Nama Posisi <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" placeholder="Contoh: Web Developer">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-map-marker-alt"></i> Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                            value="{{ old('location', 'Surakarta, Jawa Tengah') }}" placeholder="Contoh: Surakarta, Jawa Tengah">
                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-clock"></i> Tipe Pekerjaan <span class="text-danger">*</span></label>
                                <select name="job_type" class="form-control @error('job_type') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Full-time','Part-time','Contract','Freelance'] as $type)
                                        <option value="{{ $type }}" {{ old('job_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('job_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-building"></i> Tipe Kerja <span class="text-danger">*</span></label>
                                <select name="work_type" class="form-control @error('work_type') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['On-site','Hybrid','Remote'] as $type)
                                        <option value="{{ $type }}" {{ old('work_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('work_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-palette"></i> Warna Card <span class="text-danger">*</span></label>
                        <select name="color_gradient" class="form-control @error('color_gradient') is-invalid @enderror">
                            <option value="">-- Pilih Warna --</option>
                            @php
                                $colors = [
                                    'from-blue-600 to-blue-800'     => '🔵 Biru',
                                    'from-purple-600 to-purple-800' => '🟣 Ungu',
                                    'from-green-600 to-green-800'   => '🟢 Hijau',
                                    'from-pink-600 to-pink-800'     => '🩷 Pink',
                                    'from-orange-600 to-orange-800' => '🟠 Orange',
                                    'from-indigo-600 to-indigo-800' => '💙 Indigo',
                                    'from-red-600 to-red-800'       => '🔴 Merah',
                                    'from-teal-600 to-teal-800'     => '🩵 Teal',
                                ];
                            @endphp
                            @foreach($colors as $value => $label)
                                <option value="{{ $value }}" {{ old('color_gradient') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('color_gradient')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-align-left"></i> Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="3" placeholder="Jelaskan tanggung jawab dan deskripsi pekerjaan">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-list-ul"></i> Kualifikasi <span class="text-danger">*</span></label>
                        <small class="text-muted d-block mb-1">Tulis satu kualifikasi per baris</small>
                        <textarea name="qualifications" class="form-control @error('qualifications') is-invalid @enderror"
                            rows="5" placeholder="Min. S1 Teknik Informatika&#10;Menguasai PHP, Laravel&#10;Pengalaman min. 2 tahun">{{ old('qualifications') }}</textarea>
                        @error('qualifications')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">
                                Tampilkan di halaman publik (Aktif)
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.job_vacancies.index') }}" class="btn btn-secondary mr-2">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Lowongan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection