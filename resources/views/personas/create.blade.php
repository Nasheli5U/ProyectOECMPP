@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Crear Persona</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('personas.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="DNI" class="block text-sm font-medium text-gray-700">DNI</label>
            <input type="text" id="DNI" name="DNI" value="{{ old('DNI') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="RUC" class="block text-sm font-medium text-gray-700">RUC</label>
            <input type="text" id="RUC" name="RUC" value="{{ old('RUC') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="domicilio_fiscal" class="block text-sm font-medium text-gray-700">Domicilio Fiscal</label>
            <input type="text" id="domicilio_fiscal" name="domicilio_fiscal" value="{{ old('domicilio_fiscal') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Persona</button>
    </form>
@endsection
