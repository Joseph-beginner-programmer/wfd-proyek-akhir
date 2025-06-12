@extends('layouts.layout')
@section('content')
    <div class="bg-gray-100 min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

            <div class="flex border-b border-gray-300 mb-6">
                <a href="#"
                    class="px-4 py-2 text-sm sm:text-base font-semibold border-b-2 border-blue-600 text-blue-600">
                    Semua Status
                </a>
                <a href="#"
                    class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all">
                    Menunggu Pembayaran
                </a>
                <a href="#"
                    class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all">
                    Selesai
                </a>
            </div>


            {{-- DAFTAR PESANAN --}}
            <div class="space-y-4">

                {{-- -------------------------------------------------- --}}
                {{-- TAMPILAN UNTUK "SEMUA STATUS" --}}
                {{-- Di sini, Anda cukup melakukan loop semua data dari controller --}}
                {{-- -------------------------------------------------- --}}
                @php
                    // Ini hanya data dummy untuk contoh. Di aplikasi nyata, ini datang dari controller.
                    $semuaPesanan = [
                        (object) [
                            'nama_venue' => 'Lapangan Futsal Senayan',
                            'tanggal' => '15 Juni 2025, 19:00',
                            'harga' => 350000,
                            'status' => 'Selesai',
                        ],
                        (object) [
                            'nama_venue' => 'Gedung Pernikahan Grandia',
                            'tanggal' => '20 Juli 2025, 10:00',
                            'harga' => 5000000,
                            'status' => 'Menunggu Pembayaran',
                        ],
                        (object) [
                            'nama_venue' => 'Studio Musik Harmoni',
                            'tanggal' => '12 Juni 2025, 14:00',
                            'harga' => 150000,
                            'status' => 'Selesai',
                        ],
                    ];
                @endphp

                <h2 class="text-xl font-semibold text-gray-700 mt-8">Contoh Tampilan: Semua Status</h2>
                @foreach ($semuaPesanan as $pesanan)
                    {{-- Komponen Kartu Pesanan --}}
                    <div
                        class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                        {{-- Detail Pesanan (Kiri) --}}
                        <div class="flex-grow">
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                                <h3 class="text-lg font-bold text-gray-900">{{ $pesanan->nama_venue }}</h3>
                                {{-- Badge Status Dinamis --}}
                                @if ($pesanan->status == 'Selesai')
                                    <span
                                        class="text-xs font-semibold text-green-800 bg-green-100 px-2 py-1 rounded-full">Selesai</span>
                                @else
                                    <span
                                        class="text-xs font-semibold text-yellow-800 bg-yellow-100 px-2 py-1 rounded-full">Menunggu
                                        Pembayaran</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-500 flex items-center"><i
                                    class="far fa-calendar-alt w-4 mr-2"></i>{{ $pesanan->tanggal }}</p>
                            <p class="text-lg font-semibold text-gray-800 mt-2">Rp
                                {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
                        </div>

                        {{-- Tombol Aksi (Kanan) --}}
                        <div class="flex-shrink-0 w-full sm:w-auto">
                            {{-- Tombol Aksi Dinamis --}}
                            @if ($pesanan->status == 'Selesai')
                                <a href="#"
                                    class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">Lihat
                                    Detail</a>
                            @else
                                <a href="#"
                                    class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">Bayar
                                    Sekarang</a>
                            @endif
                        </div>
                    </div>
                @endforeach

                <hr class="my-12">

                {{-- -------------------------------------------------- --}}
                {{-- TAMPILAN UNTUK "MENUNGGU PEMBAYARAN" --}}
                {{-- Di sini, Anda melakukan loop data dengan kondisi IF --}}
                {{-- -------------------------------------------------- --}}
                <h2 class="text-xl font-semibold text-gray-700">Contoh Tampilan: Menunggu Pembayaran</h2>
                @foreach ($semuaPesanan as $pesanan)
                    @if ($pesanan->status == 'Menunggu Pembayaran')
                        <div
                            class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex-grow">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $pesanan->nama_venue }}</h3>
                                    <span
                                        class="text-xs font-semibold text-yellow-800 bg-yellow-100 px-2 py-1 rounded-full">Menunggu
                                        Pembayaran</span>
                                </div>
                                <p class="text-sm text-gray-500 flex items-center"><i
                                        class="far fa-calendar-alt w-4 mr-2"></i>{{ $pesanan->tanggal }}</p>
                                <p class="text-lg font-semibold text-gray-800 mt-2">Rp
                                    {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex-shrink-0 w-full sm:w-auto">
                                <a href="#"
                                    class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">Bayar
                                    Sekarang</a>
                            </div>
                        </div>
                    @endif
                @endforeach


                <hr class="my-12">

                {{-- -------------------------------------------------- --}}
                {{-- TAMPILAN UNTUK "SELESAI" --}}
                {{-- Sama seperti sebelumnya, loop data dengan kondisi IF --}}
                {{-- -------------------------------------------------- --}}
                <h2 class="text-xl font-semibold text-gray-700">Contoh Tampilan: Selesai</h2>
                @foreach ($semuaPesanan as $pesanan)
                    @if ($pesanan->status == 'Selesai')
                        <div
                            class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex-grow">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $pesanan->nama_venue }}</h3>
                                    <span
                                        class="text-xs font-semibold text-green-800 bg-green-100 px-2 py-1 rounded-full">Selesai</span>
                                </div>
                                <p class="text-sm text-gray-500 flex items-center"><i
                                        class="far fa-calendar-alt w-4 mr-2"></i>{{ $pesanan->tanggal }}</p>
                                <p class="text-lg font-semibold text-gray-800 mt-2">Rp
                                    {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex-shrink-0 w-full sm:w-auto">
                                <a href="#"
                                    class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection
