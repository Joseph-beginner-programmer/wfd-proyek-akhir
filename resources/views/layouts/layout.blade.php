<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        .roboto {
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <title>Document</title>
</head>

<body class="bg-gray-100">
    @include('layouts.header')

    <div>
        @yield('content')
    </div>
    

</body>
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