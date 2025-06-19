{{-- Menggunakan layout utama aplikasi Anda, contoh: 'layouts.app' --}}
{{-- Pastikan layout utama Anda memuat file CSS Tailwind --}}
@extends('layouts.layout')

{{-- Section ini akan mengisi bagian 'content' di layout utama --}}
@section('content')

{{-- Main Content Area --}}
{{-- Variabel $page dikirim dari PageController --}}
<main class="text-center py-16 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-bold text-gray-800 sm:text-5xl">
        {{ $page->title ?? 'About Us' }}
    </h1>
    <hr class="w-24 h-1 bg-blue-800 mx-auto my-6">
    <p class="max-w-2xl mx-auto text-lg leading-relaxed text-gray-600">
        {{-- Menggunakan {!! !!} agar tag HTML dari database bisa dirender --}}
        {!! $page->content ?? 'Providing an Easy way for people to look and also book venues at their own leisure. Using state of the art technology, we aim to provide a safe and easy way to complete all of your needs when it comes to booking a venue.' !!}
    </p>
</main>

<!-- Bottom Image Sections -->
<div class="mt-16 flex flex-col md:flex-row w-full min-h-[400px]">
    {{-- Business Section --}}
    <section
        class="flex-1 relative bg-cover bg-center text-white"
        style="background-image: url('https://images.unsplash.com/photo-1443527394413-4b820fd08dde?q=80&w=1169&auto=format&fit=full');">
        {{-- Tautan untuk seluruh area section --}}
        <a href="{{ route('businesss') }}" class="relative w-full h-full flex items-center justify-center">
            {{-- Overlay Gelap dengan efek hover --}}
            <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-60 transition-opacity duration-300"></div>
            <h2 class="relative z-10 text-4xl monteserrat-title text-white transition-all duration-300 ease-in-out hover:scale-105 hover:text-blue-300">Our Business</h2>
        </a>
    </section>

    {{-- Teams Section --}}
    <section
        class="flex-1 relative bg-cover bg-center text-white"
        style="background-image: url('https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?q=80&w=1147&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        {{-- Tautan untuk seluruh area section --}}
        <a href="{{ route('teams') }}" class="relative w-full h-full flex items-center justify-center">
            {{-- Overlay Gelap dengan efek hover --}}
            <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-50 transition-opacity duration-300"></div>
            <h2 class="relative z-10 text-4xl monteserrat-title text-white transition-all duration-300 ease-in-out hover:scale-105 hover:text-blue-300">Meet our teams</h2>
        </a>
    </section>
</div>
@endsection