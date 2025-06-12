<header class="bg-blue-900 px-5 py-5 flex items-center justify-between shadow-lg">
    <h1 class="text-white text-2xl font-bold roboto">ReserveIn</h1>

    <div class="flex items-center gap-1">
        <button class="pb-1">
            <img src="{{ asset('images/shopping-cart.png') }}" class="w-7 h-7">
        </button>
        <img src="{{ asset('images/white-line.png') }}" class="w-5 h-5 rotate-135">
        <button onclick="toggleSidebar()" class="md:hidden text-white focus:outline-none mr-5">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

</header>

<!-- Mobile Sidebar: slides in from the right -->
<aside id="mobileSidebar"
    class="fixed top-0 right-0 h-full z-40 bg-gray-800 text-white p-4 w-64 transform translate-x-full transition-transform md:hidden">
    <!-- Right Arrow Close Button -->
    <button onclick="toggleSidebar()" class="text-white mb-4 flex items-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
        </svg>
        <span>Close</span>
    </button>

    <ul>
        <li class="mb-2"><a href="#" class="roboto hover:underline">Dashboard</a></li>
        <li class="mb-2"><a href="{{ route('venues') }}" class="roboto hover:underline">Reserve a Venue</a></li>
        <li class="mb-2"><a href="#" class="roboto hover:underline">Partner with us</a></li>
        <li class="mb-2"><a href="#" class="roboto hover:underline">Blog</a></li>
        @guest
        <li class="mb-2"><a href="/login" class="roboto hover:underline">Log In</a></li>
        @endguest

        @auth
        <li class="mb-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
        </li>
        @endauth

    </ul>
</aside>

<!-- Optional overlay -->
<!-- Light Transparent Overlay -->
<div id="sidebarOverlay"
    class="fixed inset-0 bg-black/50 z-30 hidden md:hidden"
    onclick="toggleSidebar()">
</div>