@extends('layouts.app')

@section('title', 'My Profile - ' . $user->name)

@section('styles')
<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 20px;
        color: white;
        text-align: center;
    }
    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        margin: 0 auto 20px;
    }
    .profile-content {
        max-width: 1200px;
        margin: -50px auto 60px;
        padding: 0 20px;
    }
    .profile-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .btn-logout {
        background: #dc2626;
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }
    .btn-logout:hover {
        background: #b91c1c;
        transform: translateY(-2px);
    }
</style>
@endsection

@section('content')
<!-- Profile Header -->
<div class="profile-header">
    <img src="{{ $user->avatar_url }}" alt="Avatar" class="profile-avatar">
    <h1 class="text-4xl font-bold mb-2">{{ $user->name }}</h1>
    <p class="text-xl opacity-90">{{ $user->email }}</p>
    <div class="mt-4">
        {!! $user->role_badge !!}
    </div>
</div>

<!-- Profile Content -->
<div class="profile-content">

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Profile Info Card -->
        <div class="profile-card">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
                <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Informasi Profile
            </h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-1">Nama Lengkap</label>
                    <p class="text-lg text-gray-800">{{ $user->name }}</p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-1">Email</label>
                    <p class="text-lg text-gray-800">{{ $user->email }}</p>
                </div>

                @if($user->phone)
                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-1">Telepon</label>
                    <p class="text-lg text-gray-800">{{ $user->phone }}</p>
                </div>
                @endif

                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-1">Role</label>
                    <p class="text-lg text-gray-800">{!! $user->role_badge !!}</p>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-1">Member Since</label>
                    <p class="text-lg text-gray-800">{{ $user->created_at->format('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <!-- Statistics Cards - GANTI yang lama -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <!-- Total Lamaran -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow">
        <h3 class="text-3xl font-bold">{{ $stats['total'] }}</h3>
        <p class="text-blue-100">Total Lamaran</p>
    </div>
    
    <!-- Pending -->
    <div class="bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-6 rounded-lg shadow">
        <h3 class="text-3xl font-bold">{{ $stats['pending'] }}</h3>
        <p class="text-yellow-100">Menunggu Review</p>
    </div>
    
    <!-- Reviewed -->
    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-lg shadow">
        <h3 class="text-3xl font-bold">{{ $stats['reviewed'] }}</h3>
        <p class="text-green-100">Sudah Direview</p>
    </div>
</div>

<!-- Riwayat Lamaran - TAMBAHKAN SECTION BARU -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-bold mb-4 flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Riwayat Lamaran Saya
    </h2>
    
    @if($allApplications->count() > 0)
        <div class="space-y-4">
            @foreach($allApplications as $application)
                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded {{ $application['type'] === 'job' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ $application['type'] === 'job' ? 'Pekerjaan' : 'Magang' }}
                                </span>
                                <h3 class="font-semibold text-gray-900">{{ $application['position'] }}</h3>
                            </div>
                            
                            <p class="text-sm text-gray-600">
                                Diajukan: {{ $application['created_at']->format('d M Y') }}
                            </p>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <!-- Status Badge -->
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'reviewed' => 'bg-blue-100 text-blue-800',
                                    'interview' => 'bg-purple-100 text-purple-800',
                                    'accepted' => 'bg-green-100 text-green-800',
                                    'rejected' => 'bg-red-100 text-red-800',
                                ];
                                $statusLabels = [
                                    'pending' => 'Pending',
                                    'reviewed' => 'Reviewed',
                                    'interview' => 'Interview',
                                    'accepted' => 'Diterima',
                                    'rejected' => 'Ditolak',
                                ];
                            @endphp
                            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $statusColors[$application['status']] }}">
                                {{ $statusLabels[$application['status']] }}
                            </span>
                            
                            <!-- View Detail Button -->
                            <a href="{{ route('profile.application.detail', ['type' => $application['type'], 'id' => $application['id']]) }}" 
                               class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8 text-gray-500">
            <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-lg font-medium">Belum ada lamaran</p>
            <p class="text-sm mt-2">Yuk mulai melamar pekerjaan atau magang yang tersedia!</p>
            <a href="{{ route('career') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Lihat Lowongan
            </a>
        </div>
    @endif
</div>
@if(Auth::user()->role !== 'visitor')
    <a href="/admin/dashboard" class="btn btn-primary">Admin Dashboard</a>
@endif

@endsection