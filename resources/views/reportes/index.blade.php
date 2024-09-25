@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Generar Reportes</h1>

    <form action="{{ route('reportes.generate') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="procedencia" class="block text-sm font-medium text-gray-700">Procedencia</label>
                <select id="procedencia" name="procedencia" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Seleccionar</option>
                    @foreach ($procedencias as $procedencia)
                        <option value="{{ $procedencia->ID_procedencia }}">{{ $procedencia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" id="con_comprobante" name="con_comprobante" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="con_comprobante" class="ml-2 block text-sm font-medium text-gray-700">Con Recibos</label>
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Generar Reporte</button>
    </form>
</div>
@endsection
