<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PT. Mitra Data Abadi - Your Trusted IT Partner')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Crimson Text', 'Times New Roman', serif;
        }
        
        .slide {
            display: none;
            animation: fadeIn 1s;
        }
        
        .slide.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        input[type="file"] {
            padding: 0.5rem;
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-white text-gray-800">
    
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-xl">M</span>
                </div>
                <span class="text-2xl font-bold text-gray-800">PT. Mitra Data Abadi</span>
            </div>
            <ul class="flex space-x-8 text-lg">
                <li><a href="{{ route('home') }}" class="hover:text-red-600 transition font-semibold {{ request()->routeIs('home') ? 'text-red-600' : '' }}">Beranda</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-green-700 transition font-semibold {{ request()->routeIs('services') ? 'text-green-700' : '' }}">Layanan</a></li>
                <li><a href="{{ route('career') }}" class="hover:text-blue-900 transition font-semibold {{ request()->routeIs('career') ? 'text-blue-900' : '' }}">Karir</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-red-700 transition font-semibold {{ request()->routeIs('about') ? 'text-red-700' : '' }}">About</a></li>
                <li>
                    <a href="{{ route('profile') }}" class="hover:text-purple-700 transition font-semibold {{ request()->routeIs('profile') ? 'text-purple-700' : '' }} flex items-center">
                        @auth
                            <img src="{{ Auth::user()->avatar_url }}" alt="Avatar" class="w-8 h-8 rounded-full mr-2 border-2 border-white">
                            Profile
                        @else
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        @endauth
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-8">Hubungi Kami</h3>
            <p class="text-xl mb-8 text-gray-300">Siap membantu kebutuhan IT Anda. Mari berdiskusi!</p>
            
            <div class="flex justify-center space-x-6">
                <a href="mailto:manaserezata@gmail.com" 
                   class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition transform hover:scale-105 shadow-lg flex items-center space-x-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <span>Email Kami</span>
                </a>
                
                <a href="https://wa.me/6281234567890" 
                   target="_blank"
                   class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition transform hover:scale-105 shadow-lg flex items-center space-x-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>WhatsApp</span>
                </a>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-700
            @auth
    @if(Auth::user()->role !== 'visitor')
        <li><a href="/admin/dashboard" class="text-red-700 font-semibold">Dashboard Admin</a></li>
    @endif
@endauth
