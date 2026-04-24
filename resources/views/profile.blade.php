@extends('layouts.app')  

@section('title', 'Profile - PT. Mitra Data Abadi')

@section('content')
<div class="container mx-auto px-6 py-16">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Profile Anda</h1>
        
        <div class="space-y-6">
            <!-- Nama Username -->
            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-2">Nama</label>
                <p class="text-xl text-gray-900 bg-gray-100 p-4 rounded-lg">{{ auth()->user()->name }}</p>
            </div>
            
            <!-- Email -->
            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-2">Email</label>
                <p class="text-xl text-gray-900 bg-gray-100 p-4 rounded-lg">{{ auth()->user()->email }}</p>
            </div>
            
            <!-- Tombol Logout -->
            <div class="text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg text-lg font-semibold transition transform hover:scale-105 shadow-lg">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection