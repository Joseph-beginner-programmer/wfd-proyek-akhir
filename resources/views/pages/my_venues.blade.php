@extends('layouts.layout')

@section('content')
<body class="bg-gray-50 font-poppins">

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Venue Saya</h1>
                <p class="mt-1 text-gray-500">Kelola semua venue yang telah Anda daftarkan di sini.</p>
            </div>
            <a href="{{ route('venues.create') }}"
               class="mt-4 sm:mt-0 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-lg transition-colors shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-plus mr-2"></i>Daftarkan Venue Baru
            </a>
        </div>

        @if($venues->isEmpty())
            <div class="text-center bg-white p-12 rounded-xl shadow-md border border-gray-200">
                <i class="fas fa-store-slash fa-4x text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700">Anda Belum Punya Venue</h3>
                <p class="text-gray-500 mt-2">Sepertinya Anda belum mendaftarkan venue apapun. Ayo mulai!</p>
                <a href="{{ route('venues.create') }}"
                   class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-lg transition-colors">
                    Daftarkan Venue Pertama Anda
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($venues as $venue)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        
                        <div class="relative">
                            <img src="{{ $venue->image_path ? asset('storage/' . $venue->image_path) : 'https://via.placeholder.com/400x250.png?text=No+Image' }}"
                                 alt="Gambar {{ $venue->name }}" class="w-full h-56 object-cover">
                            <div class="absolute top-3 right-3 bg-blue-600 text-white text-sm font-bold px-3 py-1 rounded-full">
                                Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }}/jam
                            </div>
                        </div>

                        <div class="p-6 flex-grow flex flex-col">
                            <h3 class="text-xl font-bold text-gray-900">{{ $venue->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $venue->tipeVenue->type_name }}</p>
                            
                            <div class="flex items-center mt-3 text-gray-600 text-sm">
                                <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                                <span>{{ $venue->provinsi }}</span>
                            </div>

                            <div class="flex-grow"></div> 

                            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-start gap-3">
                                <a href="{{ route('venues.edit', $venue->venue_id) }}"
                                   class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">
                                   <i class="fas fa-pencil-alt mr-1"></i> Edit
                                </a>

                                <form action="{{ route('venues.destroy', $venue->venue_id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus venue \'{{ $venue->name }}\'? Tindakan ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">
                                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</body>
@endsection