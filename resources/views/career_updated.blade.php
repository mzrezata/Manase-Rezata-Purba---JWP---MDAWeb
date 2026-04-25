@extends('layouts.app')

@section('title', 'Karir - PT. Mitra Data Abadi')

@section('styles')
<style>
    .form-section {
        display: none;
    }
    
    .form-section.active {
        display: block;
        animation: fadeIn 0.5s;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .loading-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }
    
    .loading-overlay.active {
        display: flex;
    }
    
    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #dc2626;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .job-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .job-card:hover {
        transform: translateY(-8px);
        border-color: #dc2626;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<!-- Career Section -->
<section id="karir" class="bg-white py-20">
    <!-- Job Openings Section -->
    <div class="container mx-auto px-6 mb-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Lowongan Pekerjaan Terbaru</h2>
            <p class="text-xl text-gray-600">Temukan posisi yang sesuai dengan keahlian Anda</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @forelse($vacancies as $vacancy)
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r {{ $vacancy->color_gradient }} p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">{{ $vacancy->title }}</h3>
                    <div class="flex items-center space-x-2 text-white text-opacity-80">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $vacancy->location }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">{{ $vacancy->job_type }}</span>
                        <span class="badge bg-blue-100 text-blue-800">{{ $vacancy->work_type }}</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $vacancy->description }}
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            @foreach($vacancy->qualifications_array as $qual)
                                <li>• {{ trim($qual) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500 text-xl">Belum ada lowongan tersedia saat ini.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <p class="text-gray-600 text-lg">
                Tertarik dengan posisi di atas? <span class="font-semibold text-red-600">Scroll ke bawah</span> untuk mengisi formulir lamaran!
            </p>
        </div>
    </div>

    {{-- Bagian form magang & pekerjaan tetap sama seperti sebelumnya --}}
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-4 text-gray-800">Bergabung Bersama Kami</h2>
        <p class="text-center text-xl text-gray-600 mb-16">Kembangkan karir Anda di PT. Mitra Data Abadi</p>
        
        <!-- Career Options -->
        <div id="career-options" class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto mb-16">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-8 shadow-lg card-hover cursor-pointer" onclick="showForm('internship')">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-3">Program Magang</h3>
                    <p class="text-gray-700 leading-relaxed">Kesempatan belajar dan berkembang bersama kami</p>
                    <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Daftar Magang
                    </button>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-8 shadow-lg card-hover cursor-pointer" onclick="showForm('job')">
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 mb-3">Lowongan Pekerjaan</h3>
                    <p class="text-gray-700 leading-relaxed">Berkarir dan tumbuh bersama perusahaan IT terpercaya</p>
                    <button class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Daftar Lowongan
                    </button>
                </div>
            </div>
        </div>

        {{-- Form Magang & Job tetap sama, tidak diubah --}}
        @include('partials.career-forms')
    </div>
</section>

<!-- Loading Overlay -->
<div id="loading-overlay" class="loading-overlay">
    <div class="text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-white text-xl font-semibold">Mengirim data...</p>
    </div>
</div>

<!-- Modal Login Prompt -->
<div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md mx-4 shadow-2xl">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Login Diperlukan</h3>
            <p class="text-gray-600 mb-6">Anda harus login terlebih dahulu untuk mengisi formulir pendaftaran</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('profile') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">Login</a>
            <button onclick="closeLoginModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition">Batal</button>
        </div>
        <p class="text-center text-sm text-gray-600 mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
    
    function showForm(type) {
        if (!isAuthenticated) { showLoginModal(); return; }
        document.getElementById('career-options').style.display = 'none';
        if (type === 'internship') {
            document.getElementById('internship-form').classList.add('active');
        } else {
            document.getElementById('job-form').classList.add('active');
        }
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    function showLoginModal() {
        const modal = document.getElementById('login-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    
    function closeLoginModal() {
        const modal = document.getElementById('login-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
    
    document.getElementById('login-modal').addEventListener('click', function(e) {
        if (e.target === this) closeLoginModal();
    });
    
    function hideForm() {
        document.getElementById('internship-form').classList.remove('active');
        document.getElementById('job-form').classList.remove('active');
        document.getElementById('career-options').style.display = 'grid';
        document.getElementById('internshipForm').reset();
        document.getElementById('jobForm').reset();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    function showLoading() { document.getElementById('loading-overlay').classList.add('active'); }
    function hideLoading() { document.getElementById('loading-overlay').classList.remove('active'); }
    
    document.getElementById('internshipForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        if (!isAuthenticated) { alert('❌ Anda harus login terlebih dahulu!'); window.location.href = '{{ route("login") }}'; return; }
        const formData = new FormData(this);
        showLoading();
        try {
            const response = await fetch('{{ route("internship.apply") }}', {
                method: 'POST', body: formData,
                headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value }
            });
            const data = await response.json();
            hideLoading();
            if (data.success) { alert('✅ ' + data.message); hideForm(); }
            else {
                let errorMsg = data.message;
                if (data.errors) { errorMsg += '\n\n'; for (let field in data.errors) errorMsg += '- ' + data.errors[field][0] + '\n'; }
                alert('❌ ' + errorMsg);
            }
        } catch (error) { hideLoading(); alert('❌ Terjadi kesalahan saat mengirim data. Silakan coba lagi.'); }
    });
    
    document.getElementById('jobForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        if (!isAuthenticated) { alert('❌ Anda harus login terlebih dahulu!'); window.location.href = '{{ route("profile") }}'; return; }
        const formData = new FormData(this);
        showLoading();
        try {
            const response = await fetch('{{ route("job.apply") }}', {
                method: 'POST', body: formData,
                headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value }
            });
            const data = await response.json();
            hideLoading();
            if (data.success) { alert('✅ ' + data.message); hideForm(); }
            else {
                let errorMsg = data.message;
                if (data.errors) { errorMsg += '\n\n'; for (let field in data.errors) errorMsg += '- ' + data.errors[field][0] + '\n'; }
                alert('❌ ' + errorMsg);
            }
        } catch (error) { hideLoading(); alert('❌ Terjadi kesalahan saat mengirim data. Silakan coba lagi.'); }
    });
    
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const maxSize = this.accept.includes('image') ? 2 * 1024 * 1024 : 10 * 1024 * 1024;
            if (this.files[0] && this.files[0].size > maxSize) {
                alert('File terlalu besar! Maksimal ' + (maxSize / (1024 * 1024)) + 'MB');
                this.value = '';
            }
        });
    });
</script>
@endsection