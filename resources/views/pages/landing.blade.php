@extends('layouts.layout')

@section('content')
<div class="px-4 mt-25 ">
    <h1 class="text-6xl font-semibold roboto text-center"><span class="text-blue-800">Make</span> Reservation <span class="text-blue-800">Create</span> Lasting Memory</h1>
    <p class="text-2xl text-center mt-2">Platform all-in-one untuk mencari venue terbaik untuk setiap jenis acara yang dapat anda bayangkan. Mulailah perjalanan seru dengan menggunakan reserveIn</p>
</div>

<div class="bg-gradient-to-r from-blue-800 to-cyan-600 max-w-[80%] mt-10 px-5 py-4 mx-auto flex items-center rounded-lg">
    <button class="text-white roboto font-bold w-full text-3xl">
        Book a Venue
    </button>
</div>

</form>
@include('pages.images')
@endsection