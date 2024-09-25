@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Crear Nueva Procedencia</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('procedencias.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control w-full p-2 border border-gray-300 rounded" value="{{ old('nombre') }}" required>
            </div>
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
                <a href="{{ route('procedencias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
            </div>
        </form>
    </div>
@endsection
