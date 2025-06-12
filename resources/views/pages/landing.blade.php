@extends('layouts.layout')

@section('content')
<div class="px-4 mt-25 md:mt-5">
    <div class="md:flex md:max-w-[90%] mx-auto">
        <div class="md:max-w-xl ">
            <h1 class="text-5xl md:text-7xl monteserrat-title text-center md:text-left"><span class="text-blue-800">Make</span> Reservation <span class="text-blue-800">Create</span> Lasting Memory</h1>
            <p class="text-2xl md:text-3xl  monteserrat-body text-center mt-3 md:mt-5 md:text-justify">Platform all-in-one untuk mencari venue terbaik untuk setiap jenis acara yang dapat anda bayangkan. Mulailah perjalanan seru dengan menggunakan reserveIn</p>
        </div>
        <div class="h-30 w-[60rem] ml-[14rem] z-20 hidden md:flex">
            <img src="{{ asset('images/person-hero.png') }}" class="h-[26rem] w-[20rem] mb-10">
        </div>
        <img src="{{ asset('images/hero-background.png') }}" class=" absolute right-0 hidden lg:flex h-[29rem] w-[45rem]">
    </div>

</div>

<div class="bg-gradient-to-r mt-10 lg:mt-8  from-blue-800 to-cyan-600 max-w-[90%] px-5 py-4 mx-auto flex items-center rounded-lg">
    <button class="text-white monteserrat-title md:text-4xl w-full text-3xl">
        Book a Venue
    </button>
</div>

</form>
<div class="md:flex md:max-w-[90%] gap-2 mx-auto">
    @include('pages.images')
    @include('pages.venue-landing')
</div>

@include('pages.why-us')
@endsection