@extends('layouts.admin')

@section('title', 'Manajemen Magang')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-graduate"></i> Manajemen Magang</h1>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.internships.index') }}">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama, email, atau telepon..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewed" {{ request('status') == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="position" class="form-control">
                        <option value="">Semua Posisi</option>
                        <option value="Web Developer">Web Developer</option>
                        <option value="Mobile Developer">Mobile Developer</option>
                        <option value="UI/UX Designer">UI/UX Designer</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="Quality Assurance">Quality Assurance</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Applications Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Institusi</th>
                        <th>Posisi</th>
                        <th>IPK</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $key => $app)
                        <tr>
                            <td>{{ $applications->firstItem() + $key }}</td>
                            <td><strong>{{ $app->full_name }}</strong></td>
                            <td>{{ $app->email }}</td>
                            <td>{{ $app->institution_name }}</td>
                            <td><span class="badge badge-info">{{ $app->desired_position }}</span></td>
                            <td>{{ $app->gpa }}</td>
                            <td>{!! $app->status_badge !!}</td>
                            <td>{{ $app->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.internships.show', $app->id) }}" class="btn btn-sm btn-primary" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.internships.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                            <td colspan="9" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada pendaftaran magang</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection