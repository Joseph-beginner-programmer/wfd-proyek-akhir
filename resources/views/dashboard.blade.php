@extends('layouts.layout') 

@section('content')
@php
    $pesananUser = [
        (object) ['id' => 1, 'nama_venue' => 'Lapangan Futsal Senayan', 'tanggal' => '15 Juni 2025, 19:00', 'harga' => 350000, 'status' => 'Selesai'],
        (object) ['id' => 2, 'nama_venue' => 'Gedung Pernikahan Grandia', 'tanggal' => '20 Juli 2025, 10:00', 'harga' => 5000000, 'status' => 'Menunggu Pembayaran'],
        (object) ['id' => 3, 'nama_venue' => 'Studio Musik Harmoni', 'tanggal' => '12 Juni 2025, 14:00', 'harga' => 150000, 'status' => 'Selesai'],
        (object) ['id' => 4, 'nama_venue' => 'Lapangan Badminton Cempaka', 'tanggal' => '30 Juni 2025, 20:00', 'harga' => 250000, 'status' => 'Menunggu Pembayaran'],
    ];
@endphp


<div class="bg-gray-100 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-5xl mx-auto">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="flex border-b border-gray-300 mb-6">
            <button data-tab-target="#semua-status"
                class="tab-button active px-4 py-2 text-sm sm:text-base font-semibold border-b-2 border-blue-600 text-blue-600">
                Semua Status
            </button>
            <button data-tab-target="#menunggu-pembayaran"
                class="tab-button px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 transition-all">
                Menunggu Pembayaran
            </button>
            <button data-tab-target="#selesai"
                class="tab-button px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 transition-all">
                Selesai
            </button>
        </div>


        <div>
            <div id="semua-status" class="tab-content space-y-4">
                @forelse ($pesananUser as $pesanan)
                    <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                        <div class="flex-grow">
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                                <h3 class="text-lg font-bold text-gray-900">{{ $pesanan->nama_venue }}</h3>
                                @if ($pesanan->status == 'Selesai')
                                    <span class="text-xs font-semibold text-green-800 bg-green-100 px-2 py-1 rounded-full">Selesai</span>
                                @else
                                    <span class="text-xs font-semibold text-yellow-800 bg-yellow-100 px-2 py-1 rounded-full">Menunggu Pembayaran</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-500 flex items-center"><i class="far fa-calendar-alt w-4 mr-2"></i>{{ $pesanan->tanggal }}</p>
                            <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex-shrink-0 w-full sm:w-auto">
                            @if ($pesanan->status == 'Selesai')
                                <a href="#" class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">Lihat Detail</a>
                            @else
                                <a href="#" class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">Bayar Sekarang</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 py-10">Anda belum memiliki riwayat pesanan.</p>
                @endforelse
            </div>

            <div id="menunggu-pembayaran" class="tab-content space-y-4 hidden">
                @php $itemsFoundMenunggu = false; @endphp
                @foreach ($pesananUser as $pesanan)
                    @if ($pesanan->status == 'Menunggu Pembayaran')
                        <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                            <div class="flex-grow">
                                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $pesanan->nama_venue }}</h3>
                                    <span class="text-xs font-semibold text-yellow-800 bg-yellow-100 px-2 py-1 rounded-full">Menunggu Pembayaran</span>
                                </div>
                                <p class="text-sm text-gray-500 flex items-center"><i class="far fa-calendar-alt w-4 mr-2"></i>{{ $pesanan->tanggal }}</p>
                                <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex-shrink-0 w-full sm:w-auto">
                                <a href="#" class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">Bayar Sekarang</a>
                            </div>
                        </div>
                        @php $itemsFoundMenunggu = true; @endphp
                    @endif
                @endforeach
                @if(!$itemsFoundMenunggu)
                    <p class="text-center text-gray-500 py-10">Tidak ada pesanan yang menunggu pembayaran.</p>
                @endif
            </div>

            <div id="selesai" class="tab-content space-y-4 hidden">
                 @php $itemsFoundSelesai = false; @endphp
                 @foreach ($pesananUser as $pesanan)
                    @if ($pesanan->status == 'Selesai')
                        <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                            <div class="flex-grow">
                                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $pesanan->nama_venue }}</h3>
                                    <span class="text-xs font-semibold text-green-800 bg-green-100 px-2 py-1 rounded-full">Selesai</span>
                                </div>
                                <p class="text-sm text-gray-500 flex items-center"><i class="far fa-calendar-alt w-4 mr-2"></i>{{ $pesanan->tanggal }}</p>
                                <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex-shrink-0 w-full sm:w-auto">
                                 <a href="#" class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">Lihat Detail</a>
                            </div>
                        </div>
                        @php $itemsFoundSelesai = true; @endphp
                    @endif
                @endforeach
                @if(!$itemsFoundSelesai)
                    <p class="text-center text-gray-500 py-10">Tidak ada pesanan yang selesai.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


{{-- Script untuk membuat tabs berfungsi --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget);

                // Sembunyikan semua konten tab
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Hapus style aktif dari semua tombol tab
                tabs.forEach(t => {
                    t.classList.remove('active', 'border-blue-600', 'text-blue-600');
                    t.classList.add('text-gray-500', 'hover:text-blue-600', 'border-transparent', 'hover:border-gray-300');
                });

                // Tampilkan konten tab yang diklik
                target.classList.remove('hidden');

                // Beri style aktif pada tombol tab yang diklik
                tab.classList.add('active', 'border-blue-600', 'text-blue-600');
                tab.classList.remove('text-gray-500', 'hover:text-blue-600', 'border-transparent', 'hover:border-gray-300');
            });
        });
    });
</script>
