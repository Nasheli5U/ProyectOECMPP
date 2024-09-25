@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Listado de Infracciones</h1>

        <a href="{{ route('infracciones.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-3 inline-block">Crear Infracción</a>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 border-b">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Código</th>
                    <th class="px-4 py-2 text-left">Descripción</th>
                    <th class="px-4 py-2 text-left">Monto</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infracciones as $infraccion)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $infraccion->ID_infraccion }}</td>
                        <td class="px-4 py-2">{{ $infraccion->codigo }}</td>
                        <td class="px-4 py-2">{{ $infraccion->descripcion }}</td>
                        <td class="px-4 py-2">{{ $infraccion->monto }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('infracciones.edit', $infraccion->ID_infraccion) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                            <form action="{{ route('infracciones.destroy', $infraccion->ID_infraccion) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('¿Estás seguro de que quieres eliminar esta infracción?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
