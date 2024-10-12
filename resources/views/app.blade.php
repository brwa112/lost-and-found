<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



        
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased" dir="rtl">
        @inertia

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
