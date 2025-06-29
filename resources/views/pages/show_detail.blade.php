@extends('layouts.layout') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Tombol Kembali --}}
    <div class="mb-6">
        <a href="{{ route('dashboard1') }}" class="text-gray-600 hover:text-gray-900 font-medium flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">

        {{-- Kolom Kiri: Detail Venue & Jadwal --}}
        <div class="lg:w-2/3 w-full">
            <div class="bg-white p-6 rounded-lg shadow-md">
                {{-- Header Detail --}}
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">{{ $booking->venue->name }}</h1>
                        <p class="text-gray-500">{{ $booking->venue->address }}</p>
                    </div>
                    {{-- Menggunakan kolom 'booking_status' --}}
                    <span class="text-sm font-semibold px-3 py-1 rounded-full
                        @if($booking->booking_status == 'confirmed') bg-green-100 text-green-800 @endif
                        @if($booking->booking_status == 'pending') bg-yellow-100 text-yellow-800 @endif
                        @if($booking->booking_status == 'cancelled') bg-red-100 text-red-800 @endif
                        @if($booking->booking_status == 'completed') bg-blue-100 text-blue-800 @endif
                    ">
                        {{ ucfirst($booking->booking_status) }}
                    </span>
                </div>

=                <img src="{{ asset('storage/' . $booking->venue->image_path) }}" alt="Foto Venue {{ $booking->venue->name }}" class="w-full h-64 object-cover rounded-lg mb-6">

                {{-- Detail Jadwal --}}
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-3 border-b pb-2">Jadwal Booking</h2>
                    {{-- Menggunakan kolom 'booking_date' --}}
                    <p class="text-gray-700 text-lg">
                       Tanggal: <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->booking_date)->isoFormat('dddd, D MMMM YYYY') }}</span>
                    </p>
                    <p class="text-gray-500 mt-2"> Rincian jam tidak tersedia di tabel. Tampilan ini hanya menunjukkan tanggal booking.</p>
                </div>

                {{-- Data Penyewa --}}
                <div>
                    <h2 class="text-xl font-semibold mb-3 border-b pb-2">Data Penyewa</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Nama Lengkap</p>
                            <p class="font-medium text-gray-800">{{ $booking->users->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-800">{{ $booking->users->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nomor Ponsel</p>
                            <p class="font-medium text-gray-800">{{ $booking->users->phone ?? 'Tidak ada' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Rincian Biaya --}}
        <div class="lg:w-1/3 w-full">
            <div class="bg-white p-6 rounded-lg shadow-md sticky top-8">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Rincian Biaya</h2>
                
                {{-- Disederhanakan karena hanya ada kolom 'price' --}}
                <div class="space-y-3">
                    <div class="border-t my-2"></div>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total Bayar</span>
                         {{-- Menggunakan kolom 'price' --}}
                        <span>Rp {{ number_format($booking->price, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="mt-6 border-t pt-4">
                     <h3 class="text-md font-semibold mb-2">Status Pembayaran</h3>
                     <p class="text-gray-600 font-medium">{{ ucfirst($booking->booking_status) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection