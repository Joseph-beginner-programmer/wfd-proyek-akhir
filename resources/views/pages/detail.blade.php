@extends('layouts.layout')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 monteserrat-body">
    <div class="lg:grid lg:grid-cols-3 lg:gap-x-12">
        <div class="lg:col-span-2 space-y-10">

            <div class="relative">
                <img src="{{ asset('storage/'  .  $venue->image_path) }}"
                    alt="Foto utama venue" class="w-full h-72 lg:h-96 object-cover rounded-xl shadow-lg">
            </div>

            <div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">{{ $venue->name}}</h1>
                <div class="flex items-center text-gray-600 mt-2">
                    <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>4.7 • {{ $venue->provinsi }}, {{ $venue->address }}</span>
                </div>
                <div class="mt-3">
                    <span class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">{{ $venue->tipeVenue->type_name }}</span>
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
                <h2 class="text-xl font-bold text-gray-800 mb-4">Pilih Lapangan</h2>

                <form method="POST" action="/bookings">
                    @csrf

                    <div id="date-selector" class="flex gap-4 overflow-x-auto">
                        @foreach ($dates as $date)
                        <div
                            class="cursor-pointer px-4 py-2 rounded-lg text-center border transition ease-in-out duration-250
        {{ $selectedDate === $date->format('Y-m-d') ? 'bg-blue-700 text-white' : 'text-gray-800 hover:bg-blue-500 hover:text-white' }}"
                            data-date="{{ $date->format('Y-m-d') }}"
                            onclick="selectDate(this)">

                            {{ $date->translatedFormat('D') }} {{-- e.g. "Kam" --}}
                            {{ $date->translatedFormat('d M') }} {{-- e.g. "12 Jun" --}}
                        </div>

                        @endforeach
                    </div>

                    <input type="hidden" name="booking_date" id="booking_date" value="{{ $selectedDate }}" />

                    <!-- Other inputs like venue_id, jadwal_ids[] -->

                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Book Now</button>
                </form>

                <div class="border border-gray-200 rounded-xl p-4 mt-4">
                    <div class="flex gap-4">
                        <img src="https://ayo.co.id/v-3.3.2/build/img/venue/1649235070776_Centro-Sawah-Besar-2.jpeg"
                            alt="Lapangan Vinyl 1" class="w-32 h-32 object-cover rounded-lg">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Lapangan Vinyl 1</h3>
                            <div class="text-sm text-gray-500 mt-1 space-y-1">
                                <p><i class="fas fa-futbol w-4 mr-1"></i> Futsal</p>
                                <p><i class="fas fa-building w-4 mr-1"></i> Indoor</p>
                                <p><i class="fas fa-layer-group w-4 mr-1"></i> Vinyl</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <p class="font-semibold text-gray-800 mb-3">3 Jadwal Tersedia</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                            {{-- Di aplikasi nyata, ini akan di-generate dengan loop --}}
                            <button
                                class="text-center p-2 border border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition">
                                <p class="text-sm">16:00 - 17:00</p>
                                <p class="font-bold">Rp160.000</p>
                            </button>
                            <button disabled
                                class="text-center p-2 border bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                                <p class="text-sm">17:00 - 18:00</p>
                                <p class="font-bold">Booked</p>
                            </button>
                            <button disabled
                                class="text-center p-2 border bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                                <p class="text-sm">19:00 - 20:00</p>
                                <p class="font-bold">Booked</p>
                            </button>
                            {{-- ... tambahkan jadwal lainnya ... --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ================================================================= --}}
        {{-- KOLOM KANAN (SIDEBAR) --}}
        {{-- ================================================================= --}}
        <div class="lg:col-span-1 mt-10 lg:mt-0">
            <div class="lg:sticky lg:top-8 space-y-6">

                <div class="border border-gray-200 rounded-xl shadow-lg p-6 text-center">
                    <p class="text-gray-500">Mulai dari</p>
                    <p class="text-3xl font-bold text-blue-700 my-2">{{ $venue->price_per_hour }} <span
                            class="text-base font-normal text-gray-500">/ Hour</span></p>
                    <button
                        class="w-full bg-blue-700 text-white font-bold py-3 rounded-lg hover:bg-blue-400 transition shadow-md">
                        Cek Ketersediaan
                    </button>
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
</script>

@endsection