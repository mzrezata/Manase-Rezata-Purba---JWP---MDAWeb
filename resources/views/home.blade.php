@extends('layouts.app')

@section('title', 'Beranda - PT. Mitra Data Abadi')

@section('content')
<!-- Homepage Section -->
<section id="beranda" class="pt-6">
    <!-- Banner Slider -->
    <div class="relative w-full h-[500px] overflow-hidden bg-gray-100">
        <div class="slide active">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&h=500&fit=crop" 
                 alt="Technology" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent flex items-center">
                <div class="container mx-auto px-6">
                    <h2 class="text-5xl font-bold text-white mb-4">Digital Transformation</h2>
                    <p class="text-2xl text-white">Solusi IT Terpercaya untuk Bisnis Anda</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920&h=500&fit=crop" 
                 alt="Team Collaboration" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-800/70 to-transparent flex items-center">
                <div class="container mx-auto px-6">
                    <h2 class="text-5xl font-bold text-white mb-4">Inovasi Berkelanjutan</h2>
                    <p class="text-2xl text-white">Mengembangkan Teknologi untuk Masa Depan</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920&h=500&fit=crop" 
                 alt="Data Analytics" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-red-800/70 to-transparent flex items-center">
                <div class="container mx-auto px-6">
                    <h2 class="text-5xl font-bold text-white mb-4">Data-Driven Solutions</h2>
                    <p class="text-2xl text-white">Optimalisasi Bisnis dengan Teknologi Cerdas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Motto Section -->
    <div class="container mx-auto px-6 py-20 text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-6 tracking-wide">
            LISTEN, UNDERSTAND AND SHARE
        </h1>
        <p class="text-3xl text-red-600 font-semibold italic">Your Trusted IT Partner</p>
        <div class="mt-8 w-24 h-1 bg-gradient-to-r from-red-600 via-green-600 to-blue-900 mx-auto"></div>
    </div>
</section>
@endsection