@forelse($venues as $venue)
    <a href="{{ route('detail', ['id' => $venue->venue_id]) }}">
        <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 ease-in-out">
            <img src="{{ asset('storage/' . $venue->image_path) }}" class="w-full h-[13rem]">
            <div class="p-6">
                <h3 class="text-xl font-bold">{{ $venue->name }}</h3>
                <p class="text-sm text-gray-600 mt-1">{{ $venue->tipeVenue->type_name }}</p>
                <div class="flex items-center mt-3 text-gray-700">
                    <svg class="w-5 h-5 text-yellow-400" ...></svg>
                    <span class="ml-2 font-semibold text-sm"><strong>4.2</strong> • {{ $venue->provinsi }}</span>
                </div>
                <p class="mt-4 text-lg font-bold">Price {{ $venue->price_per_hour }} / Hour</p>
            </div>
        </div>
    </a>
@empty
    <p class="text-gray-600 col-span-3">No venues found.</p>
@endforelse
