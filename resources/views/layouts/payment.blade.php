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
    <!-- Add this in your <head> or layout file if not already included -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .roboto {
            font-family: 'Roboto', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .monteserrat-body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            /* Use the weight you imported */
        }

        .monteserrat-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            /* Use the weight you imported */
        }

        .monteserrat-heading {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            /* Use the weight you imported */
        }

        .text-shadow-glow {
            text-shadow: 0 0 5px #fff, 0 0 10px #0ff, 0 0 20px #0ff;
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Document</title>
</head>

<body>
    @yield('content')
</body>

</html>