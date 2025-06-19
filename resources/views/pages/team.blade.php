@extends('layouts.layout')

@section('content')
    <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-gray-800 sm:text-5xl">Meet Our Team</h2>
                <p class="mt-4 text-lg text-gray-600">The talented individuals behind ReserveIn.</p>
                <hr class="w-24 h-1 bg-blue-800 mx-auto my-6">
            </div>

            @php
                $teamMembers = [
                    [
                        'name' => 'Joseph Evan Tanujaya',
                        'nim' => 'C14230096',
                        'image' => 'storage/img/joseph.jpg',
                        'title' => 'CFO',
                    ],
                    [
                        'name' => 'Marcel Hans Sasongko',
                        'nim' => 'C14230099',
                        'image' => 'storage/img/marcel.jpg',
                        'title' => 'President',
                    ],
                    [
                        'name' => 'Steve Nelson Tjiong',
                        'nim' => 'C14230271',
                        'image' => 'https://placehold.co/400x400/E2E8F0/333333?text=S.N.T',
                        'title' => 'Manager',
                    ],
                    [
                        'name' => 'Maximillian Soedarmadji',
                        'nim' => 'C14230079',
                        'image' => 'https://placehold.co/400x400/E2E8F0/333333?text=M.S',
                        'title' => 'Business Analyst',
                    ],
                    [
                        'name' => 'Mellyana Christabella K.',
                        'nim' => 'C14230072',
                        'image' => 'storage/img/bella.jpg',
                        'title' => 'CSO',
                    ],
                ];
            @endphp

            <div class="mt-12 grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($teamMembers as $member)
                    <div
                        class="text-center bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
                        @if ($member['title'])
                            <p class="mb-2 text-m font-bold text-blue-800">{{ $member['title'] }}</p>
                        @endif
                        <div class="w-32 h-32 mx-auto overflow-hidden  items-center justify-center">
                            <img class="w-full h-full object-cover rounded-full" src="{{ asset($member['image']) }}"
                                alt="Foto {{ $member['name'] }}">
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $member['name'] }}</h3>
                        <p class="mt-1 text-gray-500">{{ $member['nim'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-16">
                <a href="{{ route('abouts') }}"
                    class="inline-block bg-blue-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    &larr; Back to About Us
                </a>
            </div>

        </div>
    </div>
@endsection
