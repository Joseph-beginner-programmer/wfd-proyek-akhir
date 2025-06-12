<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .roboto {
            font-family: 'Roboto', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .monteserrat-body{
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            /* Use the weight you imported */
        }

        .monteserrat-title{
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            /* Use the weight you imported */
        }

        .monteserrat-heading{
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            /* Use the weight you imported */
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Document</title>
</head>

<body class="bg-gray-100">
    @include('layouts.header')

    <div>
        @yield('content')
    </div>


</body>
@stack('script')
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const isOpen = !sidebar.classList.contains('translate-x-full');

        if (isOpen) {
            sidebar.classList.add('translate-x-full');
            overlay.classList.add('hidden');
        } else {
            sidebar.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
        }
    }
</script>



</html>