@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Editar Expediente</h1>

    <form action="{{ route('expedientes.update', $expediente->ID_expediente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="ID_persona">Persona</label>
                <select id="ID_persona" name="ID_persona" required>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->ID_persona }}" @if($expediente->ID_persona == $persona->ID_persona) selected @endif>
                            {{ $persona->nombre }} {{ $persona->apellido }} (DNI: {{ $persona->DNI }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="direccion_predio">Dirección del Predio</label>
                <input type="text" id="direccion_predio" name="direccion_predio" value="{{ $expediente->direccion_predio }}" required>
            </div>

            <div>
                <label for="ID_procedencia">Procedencia</label>
                <select id="ID_procedencia" name="ID_procedencia" required>
                    @foreach ($procedencias as $procedencia)
                        <option value="{{ $procedencia->ID_procedencia }}" @if($expediente->ID_procedencia == $procedencia->ID_procedencia) selected @endif>
                            {{ $procedencia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ID_infraccion">Infracción</label>
                <select id="ID_infraccion" name="ID_infraccion" required>
                    @foreach ($infracciones as $infraccion)
                        <option value="{{ $infraccion->ID_infraccion }}" @if($expediente->ID_infraccion == $infraccion->ID_infraccion) selected @endif>
                            {{ $infraccion->codigo }} (Monto: {{ $infraccion->monto }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label for="medida_complementaria">Medida Complementaria</label>
                <textarea id="medida_complementaria" name="medida_complementaria">{{ $expediente->medida_complementaria }}</textarea>
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white">Actualizar Expediente</button>
    </form>

    <form action="{{ route('expedientes.destroy', $expediente->ID_expediente) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Eliminar Expediente</button>
    </form>

    <form action="{{ route('expedientes.baja', $expediente->ID_expediente) }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-red-700 hover:bg-red-900 text-white px-4 py-2 rounded">Dar Baja Definitiva</button>
    </form>
</div>
@endsection
