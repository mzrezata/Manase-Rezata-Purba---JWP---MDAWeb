@extends('layouts.admin')

@section('title', 'Manajemen Lowongan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-clipboard-list"></i> Manajemen Lowongan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.job_vacancies.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Lowongan
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

{{-- Filter --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.job_vacancies.index') }}">
            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari nama posisi..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.job_vacancies.index') }}" class="btn btn-secondary btn-block">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Tabel --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Posisi</th>
                        <th>Lokasi</th>
                        <th>Tipe</th>
                        <th>Kerja</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vacancies as $key => $vacancy)
                        <tr>
                            <td>{{ $vacancies->firstItem() + $key }}</td>
                            <td><strong>{{ $vacancy->title }}</strong></td>
                            <td>{{ $vacancy->location }}</td>
                            <td><span class="badge badge-success">{{ $vacancy->job_type }}</span></td>
                            <td><span class="badge badge-info">{{ $vacancy->work_type }}</span></td>
                            <td>
                                @if($vacancy->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>{{ $vacancy->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.job_vacancies.edit', $vacancy->id) }}"
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.job_vacancies.destroy', $vacancy->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus lowongan {{ $vacancy->title }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-clipboard fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada lowongan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $vacancies->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection