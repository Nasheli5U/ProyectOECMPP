@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Editar Estado del Expediente</h1>

    <form action="{{ route('expedientes.update_estado', $expediente->ID_expediente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="numero_expediente">Número de Expediente</label>
                <input type="text" id="numero_expediente" name="numero_expediente" value="{{ $expediente->numero }}" readonly>
            </div>

            <div>
                <label for="monto_adeudado">Monto Adeudado</label>
                <input type="text" id="monto_adeudado" name="monto_adeudado" value="{{ $expediente->infraccion->monto }}" readonly>
            </div>

            <div>
                <label for="estado">Estado</label>
                <select id="estado" name="estado" required>
                    <option value="REC" @if($expediente->estado == 'REC') selected @endif>REC</option>
                    <option value="REEF" @if($expediente->estado == 'REEF') selected @endif>REEF</option>
                    <option value="RC" @if($expediente->estado == 'RC') selected @endif>RC</option>
                    <option value="RSEC" @if($expediente->estado == 'RSEC') selected @endif>RSEC</option>
                </select>
            </div>

            <div>
                <label for="fecha_notificacion">Fecha de Notificación</label>
                <input type="date" id="fecha_notificacion" name="fecha_notificacion" value="{{ $expediente->fecha_notificacion }}">
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white">Actualizar Estado</button>
    </form>
</div>
@endsection
