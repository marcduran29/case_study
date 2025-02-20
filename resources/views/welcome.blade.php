<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Case Study</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-blue-600">Bienvenido a Case Study</h1>
        <p class="mt-4 text-gray-700">Proyecto Laravel con Vue y Tailwind</p>
        <a href="{{ route('dashboard') }}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded">Ir al Dashboard</a>
    </div>
</body>
</html>
