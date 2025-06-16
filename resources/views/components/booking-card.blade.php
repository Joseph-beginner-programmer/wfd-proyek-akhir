@props(['booking', 'badgeClasses', 'badgeText'])

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
        <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ number_format($booking->name, 0, ',', '.') }}</p>
    </div>
    <div class="flex-shrink-0 w-full sm:w-auto">
        @if ($status === 'completed')
            <a href="#" class="w-full sm:w-auto block text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition">Lihat Detail</a>
        @else
            <a href="#" class="w-full sm:w-auto block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">Checkout</a>
        @endif
    </div>
</div>
