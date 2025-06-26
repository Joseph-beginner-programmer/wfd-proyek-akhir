@extends('layouts.payment')

@section('content')

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-4 md:p-8">
        <div class="mb-8">
            <img src="{{ asset('logo/logo payment.png') }}" alt="RESERVEIN logo" class="h-16">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8">
            <div class="lg:col-span-2 space-y-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $booking->venue->name}}</h1>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <svg class="w-4 h-4 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="font-semibold text-gray-700 mr-2">4.92</span>
                        <span class="mr-2">•</span>
                        <span>Kota Surabaya</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">Jadwal Booking</h2>
                    <div class="space-y-4">

                        @foreach ($booking->bookingHours as $bookingHour)
                        @php
                        $jadwal = $bookingHour->jadwalVenue;
                        $dayName = \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('D, d F Y');
                        $start = \Carbon\Carbon::parse($jadwal->start_time)->format('H:i');
                        $end = \Carbon\Carbon::parse($jadwal->end_time)->format('H:i');
                        $price = number_format($booking->venue->price_per_hour, 0, ',', '.');
                        @endphp

                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-medium">{{ $dayName }} • {{ $start }} - {{ $end }}</p>
                                <p class="text-gray-600 font-semibold">Rp{{ $price }}</p>
                            </div>
                            <button class="text-gray-400 hover:text-blue-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                        @endforeach


                    </div>

                    <a href="{{ route('detail', ['id' => $venue_id]) }}">
                        <button class="mt-6 text-blue-600 font-semibold flex items-center hover:text-blue-700 hover:underline">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Tambah Jadwal
                        </button>
                    </a>

                </div>
            </div>

            <div class="lg:col-span-1 space-y-6 mt-8 lg:mt-0">

                <a href="#" class="flex justify-between items-center bg-white rounded-xl shadow-md p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <span class="bg-red-100 text-blue-600 p-2 rounded-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                            </svg>
                        </span>
                        <span class="ml-4 font-semibold text-gray-700">Gunakan Voucher</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <h3 class="font-bold text-gray-800">Rincian Biaya</h3>
                    </div>
                    <div class="space-y-3 text-gray-600">
                        <div class="flex justify-between">
                            <span>Biaya Sewa</span>
                            <span>{{number_format($booking->price, 0, ',', '.')}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Biaya Produk Tambahan</span>
                            <span>Rp0</span>
                        </div>
                        <hr class="my-3">
                        <div class="flex justify-between font-bold text-gray-800">
                            <span>Total Bayar</span>
                            <span>{{number_format($booking->price, 0, ',', '.')}}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Atur Pembayaran</h3>
                    <div class="flex items-center">
                        <input id="bayar_lunas" type="radio" name="payment" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blule-500" checked>
                        <label for="bayar_lunas" class="ml-3 block text-sm font-medium text-gray-700">
                            Bayar Lunas
                            <span class="block font-bold text-gray-800">{{number_format($booking->price, 0, ',', '.')}}</span>
                        </label>
                    </div>
                </div>

                <a href="#" class="flex justify-between items-center bg-white rounded-xl shadow-md p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <span class="text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 20.944L12 22l9-1.056A12.02 12.02 0 0021.618 7.984z"></path>
                            </svg>
                        </span>
                        <span class="ml-4 font-semibold text-gray-700">Kebijakan Reschedule & Pembatalan</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>

                <a href="{{ route('method', ['id' => $booking->booking_id]) }}" class="w-full bg-blue-700 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                    Lanjutkan ke Pembayaran
                </a>
            </div>
        </div>
    </div>

</body>

</html>
@endsection