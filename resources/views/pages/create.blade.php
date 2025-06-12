@extends('layouts.layout')
@section('content')

<body class="bg-gradient-to-br from-cyan-50 to-blue-200 font-poppins">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-3xl">
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl">
                <div class="p-8 sm:p-12">
                    <div class="text-center">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Daftarkan Venue Baru</h1>
                        <p class="text-gray-500 mt-2">Isi detail di bawah untuk menampilkan venue Anda di platform kami.
                        </p>
                    </div>

                    {{-- <div class="mt-8">
                            @if ($errors->any())
                                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md"
                                    role="alert">
                                    <p class="font-bold">Oops! Ada beberapa kesalahan:</p>
                                    <ul class="list-disc list-inside mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif --}}

                <form action="{{ route('venues.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-building text-gray-400"></i>
                            </div>
                            <input type="text" name="name" placeholder="Nama Venue"
                                value="{{ old('name') }}" required
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-tags text-gray-400"></i>
                            </div>
                            <select name="type_id" required
                                class="w-full appearance-none bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                <option selected disabled value="">Pilih Tipe Venue...</option>
                                @foreach ($tipe_venue as $tipe)
                                <option value="{{ $tipe->type_id }}"
                                    {{ old('type_id') == $tipe->type_id ? 'selected' : '' }}>
                                    {{ $tipe->type_name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                            </div>
                            <input type="text" name="address" placeholder="Alamat Lengkap"
                                value="{{ old('address') }}" required
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-globe-asia text-gray-400"></i>
                            </div>
                            <input type="text" name="provinsi" placeholder="Provinsi"
                                value="{{ old('provinsi') }}" required
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>

                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 pt-3 flex items-start pointer-events-none">
                                <i class="fas fa-align-left text-gray-400"></i>
                            </div>
                            <textarea name="description" placeholder="Deskripsi Singkat Venue" rows="4" required
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('description') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-dollar-sign text-gray-400"></i>
                                </div>
                                <input type="number" name="price_per_hour" placeholder="Harga/Jam"
                                    value="{{ old('price_per_hour') }}" required
                                    class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-users text-gray-400"></i>
                                </div>
                                <input type="number" name="capacity" placeholder="Kapasitas"
                                    value="{{ old('capacity') }}" required
                                    class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input type="text" name="phone_contact" placeholder="Kontak"
                                    value="{{ old('phone_contact') }}" required
                                    class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div class="relative w-full">
                            <!-- File Icon -->
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Use a Heroicon or SVG -->
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z" />
                                </svg>
                            </div>

                            <!-- File Input -->
                            <input type="file" name="image_path" required
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 pl-10 text-sm file:mr-4 file:py-2 file:px-4
               file:rounded-md file:border-0 file:text-sm file:font-semibold
               file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>


                        <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4">
                            <a href="/product"
                                class="w-full sm:w-auto text-center bg-transparent hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors">Batal</a>
                            <button type="submit"
                                class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-colors shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-300">
                                Simpan Venue
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>
@endsection