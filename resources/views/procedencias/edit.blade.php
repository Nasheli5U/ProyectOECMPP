@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Procedencia</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('procedencias.update', $procedencia->ID_procedencia) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') <!-- Asegúrate de usar PUT o PATCH -->
            <div class="form-group">
                <label for="nombre" class="block text-gray-700 font-medium">Nombre de Procedencia</label>
                <input type="text" class="form-control w-full p-2 border border-gray-300 rounded" id="nombre" name="nombre" value="{{ old('nombre', $procedencia->nombre) }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar</button>
        </form>
    </div>
@endsection
