@extends('layouts.layout')
@section('content')
    </head>

    <body class="bg-white font-poppins">

        <div
            class="mt-5 shadow-[0_0_20px_rgba(0,0,0,0.15)] rounded-xl w-[90%] mx-auto px-2 py-3 flex flex-col items-center justify-center min-h-[10rem]">
            <h1 class="text-blue-800 monteserrat-title text-2xl mb-3">
                Reservasi Venue Online Terbaik
            </h1>
            <a href="/create"
                class="bg-blue-800 px-4 py-2 monteserrat-body rounded-lg text-white hover:bg-blue-600 transition duration-100 ease-in-out">
                Daftarkan Venue -></a>
        </div>

        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="mt-2 mb-6 flex flex-col md:flex-row items-center gap-5">
                <input type="text" placeholder="Nama Venue"
                    class="w-full md:w-1/4 p-3 border-2 border-black rounded-lg font-semibold placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <input type="dropdown" placeholder="Location"
                    class="w-full md:w-1/4 p-3 border-2 border-black rounded-lg font-semibold placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <div class="col-md-3 border-2 rounded-lg p-3  ">
                    <select class="form-select search-input" aria-label="Pilih Tipe Venue">
                        <option selected disabled>Tipe Venue</option>
                        <option value="olahraga">Olahraga</option>
                        <option value="pernikahan">Pernikahan</option>
                        <option value="kantor">Kantor</option>
                        <option value="hiburan">Hiburan</option>
                        <option value="studio">Studio Musik</option>
                    </select>
                </div>
                <a href=""
                    class="border-2  bg-blue-800 px-4 py-3 rounded-lg text-white hover:bg-blue-600 transition duration-100 ease-in-out ">Cari
                    Venue</a>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($venues as $venue)
                    <a href="{{ route('detail', ['id' => $venue->venue_id]) }}">
                        <div
                            class="bg-gray-50 rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 ease-in-out">
                            <img src="{{ asset('storage/' . $venue->image_path) }}"
                                alt="{{ asset('storage/' . $venue->image_path) }}" class="w-full h-[13rem]">

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900">{{ $venue->name }}</h3>

                                <p class="text-sm text-gray-600 mt-1">{{ $venue->tipeVenue->type_name }}</p>

                                <div class="flex items-center mt-3 text-gray-700">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span class="ml-2 font-semibold text-sm"><strong>4.2</strong> •
                                        {{ $venue->provinsi }}</span>
                                </div>
                                <p class=" mt-4 text-lg font-bold text-gray-900">Price {{ $venue->price_per_hour }} / Hour
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            </div>
        </main>
    </body>
@endsection
