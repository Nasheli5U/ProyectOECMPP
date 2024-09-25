<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    @vite('resources/css/app.css')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Encabezado -->
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

    <!-- Contenido de la aplicación -->
    <div class="flex">
    <aside id="default-sidebar" class="fixed top-16 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-800 flex flex-col">
    <div class="h-full px-3 py-4 overflow-y-auto flex flex-col">
        <ul class="space-y-2 font-medium flex-grow">
                    <!-- Sección Agregar Expediente -->
                    <li>
                        <a href="{{ route('expedientes.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a8 8 0 11-8 8 8 8 0 018-8m0-2a10 10 0 1010 10A10 10 0 0010 0z"/>
                                <path d="M9 13h2v2H9zm1-2a3 3 0 113-3 3 3 0 01-3 3z"/>
                            </svg>
                            <span class="ml-3">Agregar Expediente</span>
                        </a>
                    </li>

                    <!-- Sección Personas -->
                    <li>
                        <a href="{{ route('personas.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a8 8 0 11-8 8 8 8 0 018-8m0-2a10 10 0 1010 10A10 10 0 0010 0z"/>
                                <path d="M9 13h2v2H9zm1-2a3 3 0 113-3 3 3 0 01-3 3z"/>
                            </svg>
                            <span class="ml-3">Personas</span>
                        </a>
                    </li>
                    <!-- Sección Procedencias -->
                    <li>
                        <a href="{{ route('procedencias.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Procedencias</span>
                        </a>
                    </li>
                    <!-- Sección Infracciones -->
                    <li>
                        <a href="{{ route('infracciones.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 4a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V4zm10 2H8v4h4V6z"/>
                            </svg>
                            <span class="ml-3">Infracciones</span>
                        </a>
                    </li>
                  
                    <!-- Sección Listado -->
                    <li>
                        <a href="{{ route('expedientes.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Listado de Expedientes </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('reportes.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Generar reportes </span>
                        </a>
                    </li>


                    <!-- Sección Pagos -->
                      <li>
                        <a href="{{ route('pagos.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Tipos de Pagos</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('comprobantes.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Agregar recibos</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('archivos.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Subir Archivos</span>
                        </a>
                    </li>



                <li class="mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 2C4.895 2 4 2.895 4 4v12c0 1.105.895 2 2 2h8c1.105 0 2-.895 2-2V4c0-1.105-.895-2-2-2H6zm0 2h8v12H6V4zm8 7h-3v2h3v3l5-4-5-4v3z"/>
                            </svg>
                            <span class="ml-3">Cerrar sesión</span>
                        </a>
                    </form>
                </li>
                
            </ul>
            </div>
        </aside>

        <!-- Contenido Principal -->
        <main class="ml-64 p-6">
            @yield('content')
        </main>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
+