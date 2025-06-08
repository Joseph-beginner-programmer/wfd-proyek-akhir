@extends('layouts.layout')

@section('content')
    <div class="px-4 mt-25 ">
        <h1 class="text-6xl font-semibold roboto text-center"><span class="text-blue-800">Make</span> Reservation <span class="text-blue-800">Create</span> Lasting Memory</h1>
        <p class="text-2xl text-center mt-2">Platform all-in-one untuk mencari venue terbaik untuk setiap jenis acara yang dapat anda bayangkan.</p>
    </div>

    <div class="bg-blue-600 max-w-[80%] mt-10 px-5 py-4 mx-auto rounded-lg">
        <input class="w-full min-h-[2rem] px-3 py-1 text-lg text-white bg-blue-800 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Venue apa yang Anda Cari">
    </div>
    @include('pages.images')
@endsection