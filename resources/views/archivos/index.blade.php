@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Buscar Expediente</h1>

    <!-- Formulario de búsqueda de expediente -->
    <form method="GET" action="{{ route('archivos.index') }}">
        @csrf
        <div class="mb-4">
            <label for="ID_expediente" class="block text-sm font-medium text-gray-700">Expediente</label>
            <select id="ID_expediente" name="ID_expediente" class="form-select mt-1 block w-full" required>
                <option value="">Seleccionar expediente</option>
                @foreach ($expedientes as $expediente)
                    <option value="{{ $expediente->ID_expediente }}" {{ isset($expedienteSeleccionado) && $expedienteSeleccionado->ID_expediente == $expediente->ID_expediente ? 'selected' : '' }}>
                        {{ $expediente->numero }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Buscar</button>
    </form>

    <!-- Mostrar archivos y comprobantes si se ha seleccionado un expediente -->
    @if ($expedienteSeleccionado)
        <h2 class="text-xl font-bold my-4">Archivos y Comprobantes para el Expediente {{ $expedienteSeleccionado->numero }}</h2>
        
        <!-- Archivos asociados -->
        <h3 class="text-lg font-semibold">Archivos Asociados</h3>
        <div class="border rounded-md p-4">
            @if ($archivos->isEmpty())
                <p>No hay archivos asociados a este expediente.</p>
            @else
                <ul>
                    @foreach ($archivos as $archivo)
                        <li>
                            {{ $archivo->nombre_archivo }} ({{ $archivo->tipo_archivo }}) - 
                            <a href="{{ route('archivos.ver', $archivo->nombre_archivo) }}" target="_blank" class="text-blue-600 hover:underline">Ver</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Comprobantes asociados -->
        <h3 class="text-lg font-semibold mt-4">Comprobantes Asociados</h3>
        <div class="border rounded-md p-4">
            @if ($comprobantes->isEmpty())
                <p>No hay comprobantes asociados a este expediente.</p>
            @else
                <ul>
                    @foreach ($comprobantes as $comprobante)
                        <li>Recibo {{ $comprobante->numero_recibo }} - Fecha: {{ $comprobante->fecha }} - Total: {{ number_format($comprobante->total, 2) }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Formulario para agregar archivos -->
        <h3 class="text-lg font-semibold mt-4">Agregar Archivos</h3>
        <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="ID_expediente" value="{{ $expedienteSeleccionado->ID_expediente }}">

            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Seleccionar archivo</label>
                <input type="file" id="file" name="file" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="tipo_archivo" class="block text-sm font-medium text-gray-700">Tipo de archivo</label>
                <select id="tipo_archivo" name="tipo_archivo" class="form-select mt-1 block w-full" required>
                    <option value="REC">REC</option>
                    <option value="REEF">REEF</option>
                    <option value="RC">RC</option>
                    <option value="RSEC">RSEC</option>
                    <option value="otros">Otros</option>
                </select>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Agregar Archivo</button>
        </form>
    @endif
</div>
@endsection
