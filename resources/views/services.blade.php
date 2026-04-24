@extends('layouts.app')

@section('title', 'Layanan - PT. Mitra Data Abadi')

@section('content')
<!-- Services Section -->
<section id="layanan" class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-4 text-gray-800">Layanan Kami</h2>
        <p class="text-center text-xl text-gray-600 mb-16">Solusi IT Profesional untuk Kebutuhan Bisnis Anda</p>
        
        <!-- Services -->
        <h3 class="text-3xl font-bold mb-8 text-gray-800">Services</h3>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=800&h=400&fit=crop" 
                     alt="Software Development" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-2xl font-bold mb-3 text-red-600">Software Development</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Kami mengembangkan aplikasi custom sesuai kebutuhan bisnis Anda. Dari web application, mobile apps, hingga enterprise software dengan teknologi terkini. Tim developer berpengalaman kami siap mewujudkan solusi digital yang scalable dan maintainable.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800&h=400&fit=crop" 
                     alt="IT Consultant" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-2xl font-bold mb-3 text-green-700">IT Consultant</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Konsultasi IT profesional untuk mengoptimalkan infrastruktur teknologi perusahaan Anda. Kami membantu merancang strategi digital, migrasi sistem, security audit, dan digital transformation yang sesuai dengan visi bisnis Anda.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&h=400&fit=crop" 
                     alt="Messenger Gateway" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-2xl font-bold mb-3 text-blue-900">Messenger Gateway</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Solusi komunikasi massal melalui SMS, WhatsApp, dan platform messaging lainnya. Ideal untuk notifikasi sistem, marketing campaign, customer service, dan komunikasi internal dengan API yang mudah diintegrasikan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Products -->
        <h3 class="text-3xl font-bold mb-8 text-gray-800">Produk</h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=800&h=400&fit=crop" 
                     alt="Peta PBB" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold mb-3 text-red-600">Peta PBB</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Sistem pemetaan digital untuk pengelolaan Pajak Bumi dan Bangunan. Visualisasi data geografis terintegrasi dengan database perpajakan untuk memudahkan identifikasi objek pajak dan perencanaan wilayah.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&h=400&fit=crop" 
                     alt="e-SPOP/LSPOP PBB" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold mb-3 text-green-700">e-SPOP/LSPOP PBB</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Aplikasi digital untuk Surat Pemberitahuan Objek Pajak dan Lampiran SPOP PBB. Memudahkan proses pendataan, verifikasi, dan validasi data objek pajak secara elektronik dengan interface yang user-friendly.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=400&fit=crop" 
                     alt="e-Pajak Daerah" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold mb-3 text-blue-900">e-Pajak Daerah</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Platform manajemen pajak daerah secara digital. Mencakup pendataan wajib pajak, perhitungan pajak otomatis, pelaporan, hingga monitoring pembayaran dengan dashboard analytics yang komprehensif.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&h=400&fit=crop" 
                     alt="e-Retribusi Daerah" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold mb-3 text-red-600">e-Retribusi Daerah</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Sistem pengelolaan retribusi daerah yang terintegrasi. Automatisasi pencatatan, billing, dan reporting retribusi pasar, parkir, kebersihan, dan jenis retribusi lainnya untuk meningkatkan PAD.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection