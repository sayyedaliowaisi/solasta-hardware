<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="bg-white text-slate-800">

    @include('components.navbar')

    <main>

        @yield('content')

    </main>

    @include('components.footer')

    <a
href="https://wa.me/919811510846"
target="_blank"
class="fixed bottom-8 right-8 bg-green-500 hover:bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl z-50">

<svg xmlns="http://www.w3.org/2000/svg"
fill="currentColor"
viewBox="0 0 24 24"
class="w-9 h-9">

<path d="M20.5 3.5A11.9 11.9 0 0 0 12.02 0C5.4 0 .03 5.37.03 11.99c0 2.11.55 4.17 1.59 5.99L0 24l6.18-1.62a11.97 11.97 0 0 0 5.84 1.49h.01c6.62 0 12-5.38 12-12 0-3.2-1.25-6.2-3.53-8.37z"/>

</svg>

</a>

</body>

</html>