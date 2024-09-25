@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Agregar Expediente</h1>

    <div class="flex justify-end mb-4">
        <span class="text-xl font-semibold">N° Exp:</span>
        <span class="ml-2 px-3 py-1 bg-gray-800 text-white rounded">{{ $numero_expediente }}</span>
    </div>

    <form action="{{ route('expedientes.store') }}" method="POST">
        @csrf

        <input type="hidden" name="numero" value="{{ $numero_expediente }}">

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="ID_persona" class="block font-semibold mb-1">Persona</label>
                <select id="ID_persona" name="ID_persona" class="w-full border-gray-300 rounded" required>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->ID_persona }}">{{ $persona->nombre }} {{ $persona->apellido }} </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="direccion_predio" class="block font-semibold mb-1">Dirección del Predio</label>
                <input type="text" id="direccion_predio" name="direccion_predio" class="w-full border-gray-300 rounded" required>
            </div>

            <div>
                <label for="ID_procedencia" class="block font-semibold mb-1">Procedencia</label>
                <select id="ID_procedencia" name="ID_procedencia" class="w-full border-gray-300 rounded" required>
                    @foreach ($procedencias as $procedencia)
                        <option value="{{ $procedencia->ID_procedencia }}">{{ $procedencia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="fecha_entrada" class="block font-semibold mb-1">Fecha de Entrada</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" class="w-full border-gray-300 rounded" required>
            </div>

            <div>
                <label for="ID_infraccion" class="block font-semibold mb-1">Infracción</label>
                <select id="ID_infraccion" name="ID_infraccion" class="w-full border-gray-300 rounded" required>
                    @foreach ($infracciones as $infraccion)
                        <option value="{{ $infraccion->ID_infraccion }}">{{ $infraccion->codigo }} (Monto: {{ $infraccion->monto }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label for="medida_complementaria" class="block font-semibold mb-1">Medida Complementaria</label>
                <textarea id="medida_complementaria" name="medida_complementaria" class="w-full border-gray-300 rounded"></textarea>
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Crear Expediente</button>
    </form>
</div>
@endsection
