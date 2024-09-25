@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Crear Infracción</h1>

    <!-- Mostrar mensajes de error -->
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('infracciones.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código de Infracción</label>
            <input type="text" name="codigo" id="codigo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('codigo') }}" required>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="porcentaje" class="block text-sm font-medium text-gray-700">Porcentaje del UIT</label>
            <input type="number" name="porcentaje" id="porcentaje" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('porcentaje') }}" required>
        </div>

        <div class="mb-4">
            <label for="monto" class="block text-sm font-medium text-gray-700">Monto (calculado)</label>
            <input type="text" name="monto" id="monto" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" readonly>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Infracción</button>
    </form>
</div>

<script>
    const uitValue = 5150; // Monto actual de la UIT
    const porcentajeInput = document.getElementById('porcentaje');
    const montoInput = document.getElementById('monto');

    porcentajeInput.addEventListener('input', function () {
        const porcentaje = parseFloat(porcentajeInput.value);
        if (!isNaN(porcentaje)) {
            const monto = (porcentaje / 100) * uitValue;
            montoInput.value = monto.toFixed(2); // Formato a dos decimales
        } else {
            montoInput.value = '';
        }
    });
</script>

@endsection
