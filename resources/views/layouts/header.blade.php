<header class="bg-blue-900 px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between shadow-lg">
    <a href="/" class="text-white text-2xl font-bold roboto">
        <div>
            <img class="h-11 w-30" src="{{ asset('logo/logo.png') }}">
        </div>
    </a>

    <div class="flex items-center text-lg gap-4">

        <nav class="hidden md:flex items-center space-x-6">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('reports.index') }}"
                        class="text-gray-200 roboto font-semibold hover:text-white transition-colors">
                        Report
                    </a>
                @endif
            @endauth
            <a href="/" class="text-gray-200 roboto font-semibold hover:text-white transition-colors">Home</a>
            <a href="{{ route('dashboard1') }}"
                class="text-gray-200 roboto font-semibold hover:text-white transition-colors">Dashboard</a>
            <a href="{{ route('abouts') }}"
                class="text-gray-200 roboto font-semibold hover:text-white transition-colors">About Us</a>
            <a href="{{ route('venues') }} "
                class="text-gray-200 roboto font-semibold hover:text-white transition-colors">Reserve a Venue</a>
            <a href="{{ route('venues.myVenues') }}"
                class=" text-gray-200 roboto font-semibold hover:text-white transition-colors">My Venue</a>
        </nav>

        <div class="hidden md:block h-6 w-px bg-blue-700"></div>

        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard1') }}" id="cart-icon">
                <button class="text-white relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />

                    </svg>
                    <span id="cart-badge"
                        class="hidden absolute -top-2 -right-2 bg-red-600 text-white rounded-full text-xs px-1.5">
                        0
                    </span>
                </button>
            </a>


            <div class="hidden md:flex items-center">
                @guest
                    <a href="/login"
                        class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors text-sm">
                        Log In
                    </a>
                @endguest
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-gray-200 md:text-lg roboto font-semibold hover:text-white transition-colors text-sm">
                            Log Out
                        </button>
                    </form>
                @endauth
            </div>

            <button onclick="toggleSidebar()" class="md:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

<aside id="mobileSidebar"
    class="fixed top-0 right-0 h-full z-40 bg-gray-800 text-white p-4 w-64 transform translate-x-full transition-transform md:hidden">
    <button onclick="toggleSidebar()" class="text-white mb-4 flex items-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
        </svg>
        <span>Close</span>
    </button>

    <ul>
        <li class="mb-2"><a href="{{ route('dashboard1') }}" class="roboto hover:underline">Dashboard</a></li>
        <li class="mb-2"><a href="{{ route('venues') }}" class="roboto hover:underline">Reserve a Venue</a></li>
        <li class="mb-2"><a href="#" class="roboto hover:underline">Partner with us</a></li>
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
                </form>
            </li>
        @endauth

    </ul>
</aside>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('translate-x-full');
        overlay.classList.toggle('hidden');
    }


    function updateCartBadge() {
        fetch("{{ route('cart.count') }}")
            .then(response => response.json())
            .then(data => {
                const badge = document.getElementById('cart-badge');
                if (data.count > 0) {
                    badge.textContent = data.count;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
    }    setInterval(updateCartBadge, 30000);
    document.addEventListener('DOMContentLoaded', updateCartBadge);
</script>
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden" onclick="toggleSidebar()">
</div>
