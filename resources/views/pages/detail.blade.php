@extends('layouts.layout')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-x-12">
            <div class="lg:col-span-2 space-y-10">

                <div class="relative">
                    <img src="https://ayo.co.id/v-3.3.2/build/img/venue/1649234858882_Centro-Sawah-Besar-1.jpeg"
                        alt="Foto utama venue" class="w-full h-72 lg:h-96 object-cover rounded-xl shadow-lg">
                    <button
                        class="absolute bottom-4 right-4 bg-white/80 backdrop-blur-sm text-gray-800 font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-white transition">
                        Lihat semua foto
                    </button>
                </div>

                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">Centro Sawah Besar</h1>
                    <div class="flex items-center text-gray-600 mt-2">
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span>4.7 • Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta</span>
                    </div>
                    <div class="mt-3">
                        <span class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">Futsal</span>
                    </div>
                </div>

                <div class="border-t border-b border-gray-200 py-8 space-y-8">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Deskripsi</h2>
                        <p class="text-gray-600">Centro Sawah Besar</p>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Aturan Venue</h2>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start"><span
                                    class="bg-gray-200 text-gray-700 w-6 h-6 flex items-center justify-center rounded-full text-xs font-bold mr-3 mt-1">1</span>
                                <span>Pelanggan harus datang tepat waktu.</span></li>
                            <li class="flex items-start"><span
                                    class="bg-gray-200 text-gray-700 w-6 h-6 flex items-center justify-center rounded-full text-xs font-bold mr-3 mt-1">2</span>
                                <span>Dilarang membawa air mineral gelas.</span></li>
                            <li class="flex items-start"><span
                                    class="bg-gray-200 text-gray-700 w-6 h-6 flex items-center justify-center rounded-full text-xs font-bold mr-3 mt-1">3</span>
                                <span>Dilarang bersandar dijaring.</span></li>
                        </ul>
                        <a href="#" class="text-blue-700 font-semibold mt-4 inline-block">Baca Selengkapnya</a>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 mb-2">Lokasi Venue</h2>
                            <p class="text-gray-600">Pasar Sawah Barat Lantai 4 Jl. Sawah Besar 1-2 Kel. Maphar Kec. Taman
                                Sari Jakarta Barat.</p>
                        </div>
                        <a href="#" class="flex items-center gap-2 text-blue-700 font-semibold">
                            <i class="fas fa-map-marked-alt"></i>
                            <span>Buka Peta</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Fasilitas</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-4 gap-x-2">
                        <div class="flex items-center text-gray-700 gap-3"><i class="fas fa-utensils w-5 text-center"></i>
                            <span>Cafe & Resto</span></div>
                        <div class="flex items-center text-gray-700 gap-3"><i
                                class="fas fa-cookie-bite w-5 text-center"></i> <span>Jual Makanan Ringan</span></div>
                        <div class="flex items-center text-gray-700 gap-3"><i class="fas fa-wine-glass w-5 text-center"></i>
                            <span>Jual Minuman</span></div>
                        <div class="flex items-center text-gray-700 gap-3"><i class="fas fa-mosque w-5 text-center"></i>
                            <span>Musholla</span></div>
                        <div class="flex items-center text-gray-700 gap-3"><i class="fas fa-car w-5 text-center"></i>
                            <span>Parkir Mobil</span></div>
                        <div class="flex items-center text-gray-700 gap-3"><i class="fas fa-motorcycle w-5 text-center"></i>
                            <span>Parkir Motor</span></div>
                    </div>
                    <a href="#" class="text-blue-700 font-semibold mt-6 inline-block">Lihat semua fasilitas</a>
                </div>

                <div class="border-t border-gray-200 pt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Pilih Lapangan</h2>

                    <div class="flex items-center space-x-2 pb-4 overflow-x-auto">
                        {{-- Di aplikasi nyata, ini akan di-generate dengan loop --}}
                        <button class="flex-shrink-0 text-center px-4 py-2 rounded-lg bg-blue-700 text-white">
                            <p class="text-xs">Kam</p>
                            <p class="font-bold">12 Jun</p>
                        </button>
                        <button
                            class="flex-shrink-0 text-center px-4 py-2 rounded-lg bg-white border border-gray-300 hover:bg-gray-50">
                            <p class="text-xs">Jum</p>
                            <p class="font-bold">13 Jun</p>
                        </button>
                        {{-- ... tambahkan tanggal lainnya ... --}}
                    </div>

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
                        <p class="text-3xl font-bold text-blue-700 my-2">Rp 90,000 <span
                                class="text-base font-normal text-gray-500">/ Sesi</span></p>
                        <button
                            class="w-full bg-blue-700 text-white font-bold py-3 rounded-lg hover:bg-blue-400 transition shadow-md">
                            Cek Ketersediaan
                        </button>
                    </div>

                    <div class="border border-gray-200 rounded-xl p-6">
                        <h3 class="font-bold text-lg text-gray-800 mb-4">Booking lewat aplikasi lebih banyak keuntungan!
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i>
                                <span>Opsi pembayaran down payment (DP)*</span></li>
                            <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i>
                                <span>Reschedule jadwal booking*</span></li>
                            <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i>
                                <span>Lebih banyak promo & voucher</span></li>
                        </ul>
                        <button
                            class="w-full bg-gray-100 text-gray-800 font-bold py-3 rounded-lg hover:bg-gray-200 transition mt-6">
                            <i class="fas fa-download mr-2"></i> UNDUH APLIKASI
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
