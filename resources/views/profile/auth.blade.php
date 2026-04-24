@extends('layouts.app')

@section('title', 'Profile - Login atau Register')

@section('styles')
<style>
    .auth-container {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }
    .auth-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
    }
    .auth-tabs {
        display: flex;
        border-bottom: 2px solid #e5e7eb;
    }
    .auth-tab {
        flex: 1;
        padding: 20px;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        background: #f9fafb;
        color: #6b7280;
    }
    .auth-tab.active {
        background: white;
        color: #dc2626;
        border-bottom: 3px solid #dc2626;
    }
    .auth-tab:hover {
        background: #f3f4f6;
    }
    .auth-content {
        display: none;
        padding: 40px;
    }
    .auth-content.active {
        display: block;
        animation: fadeIn 0.5s;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <!-- Tabs -->
        <div class="auth-tabs">
            <div class="auth-tab active" onclick="switchTab('login')">
                <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Login
            </div>
            <div class="auth-tab" onclick="switchTab('register')">
                <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Register
            </div>
        </div>

        <!-- Login Form -->
        <div id="login-content" class="auth-content active">
            <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Welcome Back!</h2>
            <p class="text-center text-gray-600 mb-8">Login untuk mengakses profile Anda</p>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Error!</strong> {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <div class="mb-4 flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2">
                        <span class="text-gray-700">Remember Me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-red-600 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition">
                    Login
                </button>
            </form>

            <p class="text-center mt-6 text-gray-600">
                Belum punya akun? 
                <a href="javascript:void(0)" onclick="switchTab('register')" class="text-red-600 font-semibold hover:underline">Register Sekarang</a>
            </p>
        </div>

        <!-- Register Form -->
        <div id="register-content" class="auth-content">
            <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Buat Akun Baru</h2>
            <p class="text-center text-gray-600 mb-8">Daftar untuk membuat profile Anda</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Password *</label>
                    <input type="password" name="password" required minlength="8"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <small class="text-gray-500">Minimal 8 karakter</small>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Konfirmasi Password *</label>
                    <input type="password" name="password_confirmation" required minlength="8"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition">
                    Register
                </button>
            </form>

            <p class="text-center mt-6 text-gray-600">
                Sudah punya akun? 
                <a href="javascript:void(0)" onclick="switchTab('login')" class="text-red-600 font-semibold hover:underline">Login Sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function switchTab(tab) {
    // Update tabs
    document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.auth-content').forEach(c => c.classList.remove('active'));
    
    if (tab === 'login') {
        document.querySelector('.auth-tab:first-child').classList.add('active');
        document.getElementById('login-content').classList.add('active');
    } else {
        document.querySelector('.auth-tab:last-child').classList.add('active');
        document.getElementById('register-content').classList.add('active');
    }
}
</script>
@endsection