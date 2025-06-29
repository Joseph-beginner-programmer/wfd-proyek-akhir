@extends('layouts.layout')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 monteserrat-body">
    <div class="lg:grid lg:grid-cols-3 lg:gap-x-12">
        <div class="lg:col-span-2 space-y-10">



            <div class="relative">
                <img src="{{ asset('storage/' . $venue->image_path) }}" alt="Foto utama venue"
                    class="w-full h-72 lg:h-96 object-cover rounded-xl shadow-lg">
            </div>

            <div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">{{ $venue->name }}</h1>
                <div class="flex items-center text-gray-600 mt-2">
                    <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>4.7 • {{ $venue->provinsi }}, {{ $venue->address }}</span>
                </div>
                <div class="mt-3">
                    <span
                        class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">{{ $venue->tipeVenue->type_name }}</span>
                </div>
            </div>

            <div class="border-t border-b border-gray-200 py-8 space-y-8">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $venue->description }}</h2>
                    <p class="text-gray-600">{{ $venue->name }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Lokasi Venue</h2>
                        <p class="text-gray-600">{{ $venue->address }}</p>
                    </div>
                    <a href="#" class="flex items-center gap-2 text-blue-700 font-semibold">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Buka Peta</span>
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-8">
                <h1 class="text-xl font-bold text-gray-800 mb-4" id="pilih">Pilih Lapangan</h1>

                <form method="POST" action="/bookings">
                    @csrf

                    <input type="hidden" name="venue_id" value="{{ $venue->venue_id }}">


                    <div id="date-selector" class="flex gap-4 overflow-x-auto">
                        @foreach ($dates as $date)
                        <div class="cursor-pointer px-4 py-2 rounded-lg text-center border transition ease-in-out duration-250
        {{ $selectedDate === $date->format('Y-m-d') ? 'bg-blue-700 text-white' : 'text-gray-800 hover:bg-blue-500 hover:text-white' }}"
                            data-date="{{ $date->format('Y-m-d') }}" onclick="selectDate(this)">

                            {{ $date->translatedFormat('D') }} {{-- e.g. "Kam" --}}
                            {{ $date->translatedFormat('d M') }} {{-- e.g. "12 Jun" --}}
                        </div>
                        @endforeach
                    </div>


                    <h2 class="mt-4 text-2xl font-bold text-gray-800 mb-2">Pilih Jadwal</h2>
                    <div id="jadwal-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                        @foreach ($allJadwals as $jadwal)
                        @if (!$jadwal->is_active)
                        {{-- Menggunakan is_active dari kode lama Anda, ini bisa diganti dengan is_booked --}}
                        {{-- Tampilan jika SUDAH DI-BOOKING --}}
                        <div
                            class="text-center border bg-gray-50 text-gray-400 rounded-lg cursor-not-allowed">
                            <p class="text-xs">60 Menit</p>
                            <p class="font-bold my-1 text-gray-400">
                                {{ \Carbon\Carbon::parse($jadwal->start_time)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($jadwal->end_time)->format('H:i') }}
                            </p>
                            <p class="font-semibold text-sm">Booked</p>
                        </div>
                        @else
                        {{-- Tampilan jika TERSEDIA (sekarang menjadi checkbox) --}}
                        <div>
                            <input type="checkbox" id="jadwal_{{ $jadwal->jadwal_id }}" name="jadwal_ids[]"
                                value="{{ $jadwal->jadwal_id }}" class="hidden peer"
                                data-time="{{ \Carbon\Carbon::parse($jadwal->start_time)->format('H:i') }}"
                                data-price="{{ $venue->price_per_hour }}">
                            <label for="jadwal_{{ $jadwal->jadwal_id }}"
                                class="block text-center p-3 border border-gray-300 bg-white rounded-lg cursor-pointer transition-all duration-200
                           peer-checked:bg-blue-700 peer-checked:text-white peer-checked:border-blue-700 peer-checked:shadow-lg
                           hover:border-blue-500">
                                <p class="text-xs text-gray-500 peer-checked:text-blue-200">60 Menit</p>
                                <p class="font-bold my-1 text-gray-800 peer-checked:text-white">
                                    {{ \Carbon\Carbon::parse($jadwal->start_time)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($jadwal->end_time)->format('H:i') }}
                                </p>
  
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <input type="hidden" name="booking_date" id="booking_date" value="{{ $selectedDate }}" />
                    <input type="hidden" name="price" id="price-input" value="0">
                    <!-- Other inputs like venue_id, jadwal_ids[] -->
                    <button id="book-button" type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Book Now</button>
                </form>
            </div>
        </div>

        {{-- ================================================================= --}}
        {{-- KOLOM KANAN (SIDEBAR) --}}
        {{-- ================================================================= --}}
        <div class="lg:col-span-1 mt-10 lg:mt-0">
            <div class="lg:sticky lg:top-8 space-y-6 py-4">

                <div class="border border-gray-200 rounded-xl shadow-lg p-6 text-center">
                    <p class="text-gray-500">Mulai dari</p>
                    <p class="text-3xl font-bold text-blue-700 my-2">{{ $venue->price_per_hour }} <span
                            class="text-base font-normal text-gray-500">/ Hour</span></p>
                    <a href="#pilih"
                        class="w-full bg-blue-700 text-white p-6 font-bold py-3 rounded-lg hover:bg-blue-400 transition shadow-md">
                        Cek Ketersediaan
                    </a>
                </div>



                <div id="booking-summary" class="border border-gray-200 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Ringkasan Pilihan Anda</h3>

                    <div id="selected-slots-list" class="space-y-2 text-gray-700">
                        <p class="text-sm text-gray-400">Pilih minimal satu jadwal untuk memulai.</p>
                    </div>

                    <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                        <div class="flex justify-between text-gray-600">
                            <span>Total Durasi:</span>
                            <span id="total-duration" class="font-semibold">0 Jam</span>
                        </div>
                        <div class="flex justify-between text-gray-900 text-xl font-bold">
                            <span>Total Harga:</span>
                            <span id="total-price-display">Rp 0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function selectDate(element) {
        // Loop through all date elements
        document.querySelectorAll('#date-selector > div').forEach(div => {
            div.classList.remove('bg-blue-700', 'text-white');
            div.classList.add('text-gray-800');

            // ✅ Remove hover classes when deselected
            div.classList.add('hover:bg-blue-500', 'hover:text-white');
        });

        // ✅ Apply selected styles to clicked element
        element.classList.add('bg-blue-700', 'text-white');
        element.classList.remove('text-gray-800');

        // ✅ Remove hover from the selected item
        element.classList.remove('hover:bg-blue-500', 'hover:text-white');

        // Update the hidden input value
        document.getElementById('booking_date').value = element.getAttribute('data-date');
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen-elemen yang dibutuhkan
        const jadwalGrid = document.getElementById('jadwal-grid');
        const summaryList = document.getElementById('selected-slots-list');
        const totalDurationEl = document.getElementById('total-duration');
        const totalPriceEl = document.getElementById('total-price');
        const bookButton = document.getElementById('book-button');


        // Fungsi untuk mengupdate ringkasan booking
        function updateBookingSummary() {
            // Dapatkan semua checkbox yang sedang dicentang
            const selectedCheckboxes = document.querySelectorAll('input[name="jadwal_ids[]"]:checked');

            let totalDuration = 0;
            let totalPrice = 0;

            // Bersihkan daftar ringkasan
            summaryList.innerHTML = '';

            if (selectedCheckboxes.length > 0) {
                selectedCheckboxes.forEach(checkbox => {
                    // Hitung total durasi (asumsi 1 slot = 1 jam)
                    totalDuration += 1;
                    // Ambil harga dari data-price dan tambahkan ke total
                    totalPrice += parseFloat(checkbox.dataset.price);

                    // Buat elemen list untuk ditampilkan di ringkasan
                    const time = checkbox.dataset.time;
                    const listItem = document.createElement('div');
                    listItem.className = 'text-sm flex justify-between';
                    listItem.innerHTML = `<span><i class="far fa-clock mr-2 text-gray-400"></i>Pkl ${time}</span> <span class="font-semibold">Rp${parseFloat(checkbox.dataset.price).toLocaleString('id-ID')}</span>`;
                    summaryList.appendChild(listItem);
                });

                // Aktifkan tombol booking
                bookButton.disabled = false;
                bookButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                bookButton.classList.add('bg-blue-500', 'hover:bg-blue-600');

            } else {
                // Jika tidak ada yang dipilih, tampilkan pesan default
                summaryList.innerHTML = '<p class="text-sm text-gray-400">Pilih minimal satu jadwal untuk memulai.</p>';

                // Nonaktifkan tombol booking
                bookButton.disabled = true;
                bookButton.classList.add('bg-gray-400', 'cursor-not-allowed');
                bookButton.classList.remove('bg-blue-500', 'hover:bg-blue-600');
            }

            document.getElementById('total-price-display').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
            document.getElementById('price-input').value = totalPrice;
        }

        // Tambahkan event listener ke container grid
        // Ini lebih efisien daripada menambah listener ke setiap checkbox
        if (jadwalGrid) {
            jadwalGrid.addEventListener('change', function(event) {
                // Pastikan yang berubah adalah checkbox
                if (event.target.type === 'checkbox') {
                    updateBookingSummary();
                }
            });
        }

        // Jalankan sekali saat halaman dimuat untuk inisialisasi tombol
        updateBookingSummary();
    });
</script>
@endsection