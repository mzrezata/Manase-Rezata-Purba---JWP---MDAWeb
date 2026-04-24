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
            <!-- IT Support -->
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">IT Support</h3>
                    <div class="flex items-center space-x-2 text-blue-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Surakarta, Jawa Tengah</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">Full-time</span>
                        <span class="badge bg-purple-100 text-purple-800">On-site</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Bertanggung jawab dalam maintenance sistem, troubleshooting hardware/software, dan memberikan support teknis kepada user.
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Min. D3 Teknik Informatika</li>
                            <li>• Pengalaman min. 1 tahun</li>
                            <li>• Menguasai Windows Server</li>
                            <li>• Problem solving yang baik</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Web Developer -->
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 to-purple-800 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Web Developer</h3>
                    <div class="flex items-center space-x-2 text-purple-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Surakarta, Jawa Tengah</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">Full-time</span>
                        <span class="badge bg-blue-100 text-blue-800">Hybrid</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Mengembangkan dan maintain aplikasi web berbasis Laravel, Vue.js, dan teknologi modern lainnya untuk berbagai project client.
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Min. S1 Teknik Informatika</li>
                            <li>• Menguasai PHP, Laravel, MySQL</li>
                            <li>• Familiar dengan Git & REST API</li>
                            <li>• Pengalaman min. 2 tahun</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Network Engineer -->
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-800 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Network Engineer</h3>
                    <div class="flex items-center space-x-2 text-green-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Surakarta, Jawa Tengah</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">Full-time</span>
                        <span class="badge bg-purple-100 text-purple-800">On-site</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Merancang, mengimplementasikan, dan memaintain infrastruktur jaringan perusahaan dan client untuk memastikan konektivitas optimal.
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Min. D3 Teknik Informatika</li>
                            <li>• Sertifikat CCNA/MTCNA</li>
                            <li>• Menguasai Mikrotik, Cisco</li>
                            <li>• Pengalaman min. 2 tahun</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- UI/UX Designer -->
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-pink-600 to-pink-800 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">UI/UX Designer</h3>
                    <div class="flex items-center space-x-2 text-pink-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Surakarta, Jawa Tengah</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">Full-time</span>
                        <span class="badge bg-blue-100 text-blue-800">Hybrid</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Merancang interface yang user-friendly dan attractive untuk aplikasi web dan mobile dengan fokus pada user experience.
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Min. D3 Desain Komunikasi Visual</li>
                            <li>• Menguasai Figma, Adobe XD</li>
                            <li>• Portfolio design yang kuat</li>
                            <li>• Pengalaman min. 1 tahun</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Data Analyst -->
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-orange-600 to-orange-800 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Data Analyst</h3>
                    <div class="flex items-center space-x-2 text-orange-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Surakarta, Jawa Tengah</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">Full-time</span>
                        <span class="badge bg-blue-100 text-blue-800">Hybrid</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Menganalisis data bisnis dan menghasilkan insight untuk mendukung pengambilan keputusan strategis perusahaan dan client.
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Min. S1 Statistik/Matematika/TI</li>
                            <li>• Menguasai SQL, Python, Excel</li>
                            <li>• Familiar dengan Power BI/Tableau</li>
                            <li>• Pengalaman min. 1 tahun</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Mobile Developer -->
            <div class="job-card bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Mobile Developer</h3>
                    <div class="flex items-center space-x-2 text-indigo-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Surakarta, Jawa Tengah</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-green-100 text-green-800">Full-time</span>
                        <span class="badge bg-blue-100 text-blue-800">Hybrid</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Mengembangkan aplikasi mobile iOS/Android menggunakan Flutter atau React Native untuk berbagai kebutuhan bisnis client.
                    </p>
                    <div class="border-t pt-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Kualifikasi:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Min. S1 Teknik Informatika</li>
                            <li>• Menguasai Flutter/React Native</li>
                            <li>• Familiar dengan REST API</li>
                            <li>• Pengalaman min. 2 tahun</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <p class="text-gray-600 text-lg">
                Tertarik dengan posisi di atas? <span class="font-semibold text-red-600">Scroll ke bawah</span> untuk mengisi formulir lamaran!
            </p>
        </div>
    </div>

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
                        Dafar Lowongan
                    </button>
                </div>
            </div>
        </div>
        
        <div id="internship-form" class="form-section max-w-4xl mx-auto bg-gray-50 rounded-lg p-8 shadow-xl">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-bold text-blue-900">Pendaftaran Magang</h3>
                <button onclick="hideForm()" class="text-gray-500 hover:text-gray-700 text-3xl font-bold">&times;</button>
            </div>
            
            <form id="internshipForm" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- A. Informasi Pribadi -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">A. Informasi Pribadi</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                            <input type="text" name="full_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tempat Lahir *</label>
                            <input type="text" name="birth_place" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Lahir *</label>
                            <input type="date" name="birth_date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Jenis Kelamin *</label>
                            <select name="gender" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nomor HP / WhatsApp *</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="08xx-xxxx-xxxx">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Alamat Domisili *</label>
                            <textarea name="address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="2"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email Aktif *</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Foto Diri (opsional)</label>
                            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- B. Latar Belakang Pendidikan -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">B. Latar Belakang Pendidikan</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Nama Institusi (SMK / Universitas) *</label>
                            <input type="text" name="institution_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Jurusan / Program Studi *</label>
                            <input type="text" name="major" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Semester Saat Ini *</label>
                            <input type="number" name="current_semester" required min="1" max="14" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">IPK Terakhir *</label>
                            <input type="number" name="gpa" required step="0.01" min="0" max="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="3.50">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tahun Masuk *</label>
                            <input type="number" name="entry_year" required min="2015" max="2025" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Perkiraan Lulus *</label>
                            <input type="number" name="graduation_year" required min="2024" max="2030" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Surat Pengantar dari Kampus (PDF) *</label>
                            <input type="file" name="recommendation_letter" required accept=".pdf" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- C. Informasi Magang -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">C. Informasi Magang</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Posisi / Divisi yang Diminati *</label>
                            <select name="desired_position" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih Posisi</option>
                                <option value="Web Developer">Web Developer</option>
                                <option value="Mobile Developer">Mobile Developer</option>
                                <option value="UI/UX Designer">UI/UX Designer</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="Quality Assurance">Quality Assurance</option>
                                <option value="Project Management">Project Management</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Tujuan Magang *</label>
                            <textarea name="internship_purpose" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="3" placeholder="Jelaskan tujuan dan harapan Anda mengikuti program magang"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Mulai *</label>
                            <input type="date" name="start_date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Selesai *</label>
                            <input type="date" name="end_date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Magang Wajib dari Kampus? *</label>
                            <select name="is_mandatory" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Ketersediaan Waktu *</label>
                            <select name="availability" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- D. Keahlian & Portofolio -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">D. Keahlian </h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Daftar Keahlian *</label>
                            <textarea name="skills" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="2" placeholder="Contoh: HTML, CSS, JavaScript, React, Python, Figma, dll"></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-12 py-4 rounded-lg text-lg font-bold transition transform hover:scale-105 shadow-lg">
                        Kirim Pendaftaran Magang
                    </button>
                </div>
            </form>
        </div>

        <!-- Job Form -->
        <div id="job-form" class="form-section max-w-4xl mx-auto bg-gray-50 rounded-lg p-8 shadow-xl">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-bold text-green-900">Pendaftaran Lowongan Pekerjaan</h3>
                <button onclick="hideForm()" class="text-gray-500 hover:text-gray-700 text-3xl font-bold">&times;</button>
            </div>
            
            <form id="jobForm" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- A. Informasi Pribadi -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">A. Informasi Pribadi</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                            <input type="text" name="full_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tempat Lahir *</label>
                            <input type="text" name="birth_place" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Lahir *</label>
                            <input type="date" name="birth_date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Jenis Kelamin *</label>
                            <select name="gender" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Status Pernikahan *</label>
                            <select name="marital_status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Alamat Lengkap *</label>
                            <textarea name="address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" rows="2"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nomor HP / WhatsApp *</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="08xx-xxxx-xxxx">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email Aktif *</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Foto Diri *</label>
                            <input type="file" name="photo" required accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- B. Pendidikan & Pengalaman -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">B. Pendidikan & Pengalaman</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Pendidikan Terakhir *</label>
                            <select name="last_education" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tahun Lulus *</label>
                            <input type="number" name="graduation_year" required min="1990" max="2025" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama Institusi *</label>
                            <input type="text" name="institution_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Jurusan *</label>
                            <input type="text" name="major" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Pengalaman Kerja</label>
                            <textarea name="work_experience" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" rows="4" placeholder="Tuliskan pengalaman kerja Anda (perusahaan, posisi, durasi, tugas)"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Sertifikasi Profesional</label>
                            <textarea name="certifications" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" rows="2" placeholder="Contoh: AWS Certified, Google Cloud, Scrum Master, dll"></textarea>
                        </div>
                    </div>
                </div>

                <!-- C. Informasi Lamaran -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">C. Informasi Lamaran</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Posisi yang Dilamar *</label>
                            <select name="applied_position" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih Posisi</option>
                                <option value="Full Stack Developer">Full Stack Developer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                                <option value="Mobile Developer">Mobile Developer</option>
                                <option value="UI/UX Designer">UI/UX Designer</option>
                                <option value="DevOps Engineer">DevOps Engineer</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="IT Consultant">IT Consultant</option>
                                <option value="Quality Assurance">Quality Assurance</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Gaji yang Diharapkan (Rp)</label>
                            <input type="number" name="expected_salary" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="5000000">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Tanggal Bisa Mulai Bekerja *</label>
                            <input type="date" name="available_from" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Bersedia Ditempatkan di Luar Kota? *</label>
                            <select name="willing_to_relocate" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Alasan Melamar di Perusahaan Kami *</label>
                            <textarea name="reason_to_apply" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" rows="4" placeholder="Jelaskan motivasi dan alasan Anda ingin bergabung dengan PT. Mitra Data Abadi"></textarea>
                        </div>
                    </div>
                </div>

                <!-- D. Keahlian & Portofolio -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">D. Keahlian & Portofolio</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Kemampuan Teknis (Hard Skills) *</label>
                            <textarea name="technical_skills" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" rows="2" placeholder="Contoh: PHP, Laravel, MySQL, JavaScript, Vue.js, Git, Docker, dll"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Soft Skills *</label>
                            <textarea name="soft_skills" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" rows="2" placeholder="Contoh: Komunikasi, Teamwork, Problem Solving, Leadership, Time Management, dll"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Link Portofolio</label>
                            <input type="url" name="portfolio_link" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="GitHub, LinkedIn, Website pribadi">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Upload CV / Resume (PDF) *</label>
                            <input type="file" name="cv_file" required accept=".pdf" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Upload Surat Lamaran (PDF) *</label>
                            <input type="file" name="cover_letter_file" required accept=".pdf" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-12 py-4 rounded-lg text-lg font-bold transition transform hover:scale-105 shadow-lg">
                        Kirim Lamaran Pekerjaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Loading Overlay -->
<div id="loading-overlay" class="loading-overlay">
    <div class="text-center">
        <div class="spinner mx-auto mb-4"></div>
        <p class="text-white text-xl font-semibold">Mengirim data...</p>
    </div>
</div>
@endsection
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
            <a href="{{ route('profile') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
                Login
            </a>
            <button onclick="closeLoginModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition">
                Batal
            </button>
        </div>
        <p class="text-center text-sm text-gray-600 mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Daftar di sini</a>
        </p>
    </div>
</div>

@section('scripts')
<script>
    // ✅ CEK APAKAH USER SUDAH LOGIN
    const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
    
    function showForm(type) {
        // ✅ PROTEKSI: Cek login dulu sebelum tampilkan form
        if (!isAuthenticated) {
            showLoginModal();
            return;
        }
        
        // Jika sudah login, lanjut tampilkan form
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
    
    // Close modal jika klik di luar
    document.getElementById('login-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLoginModal();
        }
    });
    
    function hideForm() {
        document.getElementById('internship-form').classList.remove('active');
        document.getElementById('job-form').classList.remove('active');
        document.getElementById('career-options').style.display = 'grid';
        
        // Reset forms
        document.getElementById('internshipForm').reset();
        document.getElementById('jobForm').reset();
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    function showLoading() {
        document.getElementById('loading-overlay').classList.add('active');
    }
    
    function hideLoading() {
        document.getElementById('loading-overlay').classList.remove('active');
    }
    
    // ✅ TAMBAHAN PROTEKSI: Cek lagi saat submit form
    document.getElementById('internshipForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Double check authentication
        if (!isAuthenticated) {
            alert('❌ Anda harus login terlebih dahulu!');
            window.location.href = '{{ route("login") }}';
            return;
        }
        
        const formData = new FormData(this);
        showLoading();
        
        try {
            const response = await fetch('{{ route("internship.apply") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            });
            
            const data = await response.json();
            hideLoading();
            
            if (data.success) {
                alert('✅ ' + data.message);
                hideForm();
            } else {
                let errorMsg = data.message;
                if (data.errors) {
                    errorMsg += '\n\n';
                    for (let field in data.errors) {
                        errorMsg += '- ' + data.errors[field][0] + '\n';
                    }
                }
                alert('❌ ' + errorMsg);
            }
        } catch (error) {
            hideLoading();
            console.error('Error:', error);
            alert('❌ Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
        }
    });
    
    // ✅ SAMA UNTUK JOB FORM
    document.getElementById('jobForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Double check authentication
        if (!isAuthenticated) {
            alert('❌ Anda harus login terlebih dahulu!');
            window.location.href = '{{ route("profile") }}';
            return;
        }
        
        const formData = new FormData(this);
        showLoading();
        
        try {
            const response = await fetch('{{ route("job.apply") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            });
            
            const data = await response.json();
            hideLoading();
            
            if (data.success) {
                alert('✅ ' + data.message);
                hideForm();
            } else {
                let errorMsg = data.message;
                if (data.errors) {
                    errorMsg += '\n\n';
                    for (let field in data.errors) {
                        errorMsg += '- ' + data.errors[field][0] + '\n';
                    }
                }
                alert('❌ ' + errorMsg);
            }
        } catch (error) {
            hideLoading();
            console.error('Error:', error);
            alert('❌ Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
        }
    });
    
    // File size validation
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