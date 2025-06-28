{{-- Menggunakan layout utama aplikasi Anda, contoh: 'layouts.layout' --}}
{{-- Pastikan layout utama Anda memuat file CSS Tailwind --}}
@extends('layouts.layout')

{{-- Section ini akan mengisi bagian 'content' di layout utama --}}
@section('content')
<div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 sm:text-5xl">Reserve IN</h2>
            <p class="mt-4 text-lg text-gray-600">Mendigitalkan dan menyederhanakan cara Anda memesan venue.</p>
            <hr class="w-24 h-1 bg-blue-800 mx-auto my-6">
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            {{-- Kolom Gambar Kiri --}}
            <div class="w-full">
                <img src="https://images.unsplash.com/photo-1443527394413-4b820fd08dde?q=80&w=1169&auto=format&fit=full" 
                     alt="Gedung Pencakar Langit" 
                     class="w-full h-full object-cover rounded-lg shadow-lg">
            </div>

            {{-- Kolom Penjelasan Kanan --}}
            <div class="text-gray-700">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Memodernisasi Pemesanan Venue</h3>
                <p class="mb-6">
                    Di era digital ini, kami melihat adanya kebutuhan krusial untuk sistem yang efisien dan terintegrasi dalam berbagai sektor. ReserveIn lahir dari gagasan untuk mentransformasi proses pemesanan venue yang seringkali masih manual, memakan waktu, dan rentan terhadap kesalahan.
                </p>

                {{-- Section Visi --}}
                <div class="mb-6">
                    <h4 class="text-2xl font-semibold text-blue-800 mb-2">Visi Kami</h4>
                    <p>Menjadi platform pemesanan venue terdepan yang paling terpercaya dan mudah digunakan di seluruh Indonesia, memberdayakan baik penyewa maupun pemilik venue.</p>
                </div>

                {{-- Section Misi --}}
                <div class="mb-6">
                    <h4 class="text-2xl font-semibold text-blue-800 mb-2">Misi Kami</h4>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Menyediakan platform yang intuitif untuk mencari, membandingkan, dan memesan venue.</li>
                        <li>Mengurangi kesalahan input manual dan menyederhanakan proses konfirmasi.</li>
                        <li>Memberikan fitur laporan yang komprehensif bagi pemilik venue untuk mengoptimalkan bisnis mereka.</li>
                        <li>Menjamin proses pembayaran yang aman, cepat, dan transparan.</li>
                    </ul>
                </div>

                {{-- Section Penawaran --}}
                <div>
                    <h4 class="text-2xl font-semibold text-blue-800 mb-2">Apa yang Kami Tawarkan</h4>
                     <ul class="list-disc list-inside space-y-2">
                        <li><strong>Pencarian Cerdas:</strong> Filter berdasarkan harga, lokasi, kapasitas, dan fasilitas.</li>
                        <li><strong>Manajemen Mudah:</strong> Dasbor intuitif untuk pemilik venue mengelola jadwal dan pesanan.</li>
                        <li><strong>Laporan Analitis:</strong> Data harian, mingguan, hingga tahunan untuk pengambilan keputusan.</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="text-center mt-16">
            <a href="{{ route('abouts') }}" class="inline-block bg-blue-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                &larr; Back
            </a>
        </div>

    </div>
</div>
@endsection
