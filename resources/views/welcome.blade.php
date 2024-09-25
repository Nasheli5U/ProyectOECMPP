<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <!-- Styles -->
</head>
<body class="bg-white-100">
<header class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Escudo_de_Puno.png" alt="Logo" class="h-10">
        </div>
        <div>
            <h1 class="text-lg font-bold">OFICINA DE EJECUCIÓN COACTIVA</h1>
        </div>
        <div>
        <img src="https://portal.munipuno.gob.pe/sites/default/files/LOGO%20MPP%202022_2.png" alt="Puno Renace" class="h-10">
        </div>
    </div>
</header>

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        
        <!-- Mensaje de Bienvenida -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800 dark:text-white">Bienvenido a la plataforma de la oficina de ejecución coactiva</h1>
        </div>

        <!-- Botones de inicio de sesión o dashboard -->
        <div class="flex justify-center space-x-4">
            @auth
                <!-- Botón para ir a Dashboard -->
                <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Dashboard</a>
            @else
                <!-- Botón para iniciar sesión -->
                <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Iniciar sesión</a>
            @endauth
        </div>
    </div>
</div>

</body>
</html>
