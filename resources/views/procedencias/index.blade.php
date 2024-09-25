@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Listado de Procedencias</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('procedencias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nueva Procedencia</a>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <th class="py-2 px-4 text-left text-gray-600">ID</th>
                        <th class="py-2 px-4 text-left text-gray-600">Nombre</th>
                        <th class="py-2 px-4 text-left text-gray-600">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($procedencias as $procedencia)
                        <tr class="border-b border-gray-200">
                            <td class="py-2 px-4 text-gray-700">{{ $procedencia->ID_procedencia }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $procedencia->nombre }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('procedencias.edit', $procedencia->ID_procedencia) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>

                                <form action="{{ route('procedencias.destroy', $procedencia->ID_procedencia) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('¿Estás seguro de eliminar esta procedencia?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
