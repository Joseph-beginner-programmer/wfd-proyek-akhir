@extends('layouts.layout')

@section('content')
@php
$booking_data = $bookings;
@endphp


<div class="bg-gray-100 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-5xl mx-auto">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="flex border-b border-gray-300 mb-6">
            <button data-tab-target="#all"
                class="tab-button active px-4 py-2 text-sm sm:text-base font-semibold border-b-2 border-blue-600 text-blue-600">
                All
            </button>
            <button data-tab-target="#pending"
                class="tab-button px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 transition-all">
                Pending
            </button>
            <button data-tab-target="#confirmed"
                class="tab-button px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 transition-all">
                Confirmed
            </button>
            <button data-tab-target="#completed"
                class="tab-button px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 transition-all">
                Completed
            </button>
            <button data-tab-target="#cancelled"
                class="tab-button px-4 py-2 text-sm sm:text-base font-semibold text-gray-500 hover:text-blue-600 transition-all">
                Cancelled
            </button>
        </div>


        <div>
            <div id="all" class="tab-content space-y-4">
                @forelse ($booking_data as $booking)
                @php
                $badgeClasses = [
                'pending' => 'text-yellow-800 bg-yellow-100',
                'confirmed' => 'text-blue-800 bg-blue-100',
                'completed' => 'text-green-800 bg-green-100',
                'cancelled' => 'text-red-800 bg-red-100',
                ];

                $badgeText = [
                'pending' => 'Pending',
                'confirmed' => 'Confirmed',
                'completed' => 'Completed',
                'cancelled' => 'Cancelled',
                ];

                $status = strtolower($booking->booking_status);
                @endphp
                <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                            <h3 class="text-lg font-bold text-gray-900">{{ $booking->name }}</h3>

                            <span class="text-xs font-semibold {{ $badgeClasses[$status] ?? 'text-gray-800 bg-gray-100' }} px-2 py-1 rounded-full">
                                {{ $badgeText[$status] ?? ucfirst($status) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 flex items-center"><i class="far fa-calendar-alt w-4 mr-2"></i>{{ $booking->booking_date }}</p>
                        <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ number_format($booking->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex-shrink-0 w-full sm:w-auto">
                        @if ($status === 'pending')
                        <a href="#"
                            class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">
                            Checkout
                        </a>
                        @else
                        <a href="#"
                            class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">
                            See Details
                        </a>
                        @endif
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500 py-10">Anda belum memiliki riwayat pesanan.</p>
                @endforelse
            </div>

            <div id="pending" class="tab-content space-y-4 hidden">
                @php $itemsFoundPending = false; @endphp
                @foreach ($booking_data as $booking)
                @if ($booking->booking_status === 'pending')
                @php
                $status = strtolower($booking->booking_status);
                @endphp

                <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                            <h3 class="text-lg font-bold text-gray-900">{{ $booking->name }}</h3>
                            <span class="text-xs font-semibold {{ $badgeClasses[$status] ?? 'text-gray-800 bg-gray-100' }} px-2 py-1 rounded-full">
                                {{ $badgeText[$status] ?? ucfirst($status) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 flex items-center"><i class="far fa-calendar-alt w-4 mr-2"></i>{{ $booking->booking_date }}</p>
                        <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ number_format($booking->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex-shrink-0 w-full sm:w-auto">
                        <a href="#" class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">Checkout</a>
                    </div>
                </div>

                @php $itemsFoundPending = true; @endphp
                @endif
                @endforeach

                @unless($itemsFoundPending)
                <p class="text-center text-gray-500 py-10">No Pending Booking</p>
                @endunless
            </div>

            <div id="confirmed" class="tab-content space-y-4 hidden">
                @php $itemsFoundConfirmed = false; @endphp

                @foreach ($booking_data as $booking)
                @if ($booking->booking_status == 'confirmed')
                @php
                $status = strtolower($booking->booking_status);
                $itemsFoundConfirmed = true;
                @endphp

                <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                            <h3 class="text-lg font-bold text-gray-900">{{ $booking->name }}</h3>
                            <span class="text-xs font-semibold {{ $badgeClasses[$status] ?? 'text-gray-800 bg-gray-100' }} px-2 py-1 rounded-full">
                                {{ $badgeText[$status] ?? ucfirst($status) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-calendar-alt w-4 mr-2"></i>{{ $booking->booking_date }}
                        </p>
                        <p class="text-lg font-semibold text-gray-800 mt-2">
                            Rp {{ number_format($booking->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="flex-shrink-0 w-full sm:w-auto">
                        <a href="#" class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">See Details</a>
                    </div>
                </div>
                @endif
                @endforeach

                @unless($itemsFoundConfirmed)
                <p class="text-center text-gray-500 py-10">No Confirmed Booking</p>
                @endunless
            </div>

            <div id="completed" class="tab-content space-y-4 hidden">
                @php $itemsFoundCompleted = false; @endphp

                @foreach ($booking_data as $booking)
                @if ($booking->booking_status == 'completed')
                @php
                $status = strtolower($booking->booking_status);
                $itemsFoundCompleted = true;
                @endphp

                <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                            <h3 class="text-lg font-bold text-gray-900">{{ $booking->name }}</h3>
                            <span class="text-xs font-semibold {{ $badgeClasses[$status] ?? 'text-gray-800 bg-gray-100' }} px-2 py-1 rounded-full">
                                {{ $badgeText[$status] ?? ucfirst($status) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-calendar-alt w-4 mr-2"></i>{{ $booking->booking_date }}
                        </p>
                        <p class="text-lg font-semibold text-gray-800 mt-2">
                            Rp {{ number_format($booking->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="flex-shrink-0 w-full sm:w-auto">
                        <a href="#" class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">See Details</a>
                    </div>
                </div>
                @endif
                @endforeach

                @unless($itemsFoundCompleted)
                <p class="text-center text-gray-500 py-10">No Completed Booking</p>
                @endunless
            </div>

            <div id="cancelled" class="tab-content space-y-4 hidden">
                @php $itemsFoundCancelled = false; @endphp

                @foreach ($booking_data as $booking)
                @if ($booking->booking_status == 'cancelled')
                @php
                $status = strtolower($booking->booking_status);
                $itemsFoundCancelled = true;
                @endphp

                <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 transition hover:shadow-md">
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-2">
                            <h3 class="text-lg font-bold text-gray-900">{{ $booking->name }}</h3>
                            <span class="text-xs font-semibold {{ $badgeClasses[$status] ?? 'text-gray-800 bg-gray-100' }} px-2 py-1 rounded-full">
                                {{ $badgeText[$status] ?? ucfirst($status) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 flex items-center">
                            <i class="far fa-calendar-alt w-4 mr-2"></i>{{ $booking->booking_date }}
                        </p>
                        <p class="text-lg font-semibold text-gray-800 mt-2">
                            Rp {{ number_format($booking->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="flex-shrink-0 w-full sm:w-auto">
                        <a href="#" class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">See Details</a>
                    </div>
                </div>
                @endif
                @endforeach

                @unless($itemsFoundCancelled)
                <p class="text-center text-gray-500 py-10">No Cancelled Booking</p>
                @endunless
            </div>
        </div>
    </div>
</div>
@endsection


{{-- Script untuk membuat tabs berfungsi --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
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