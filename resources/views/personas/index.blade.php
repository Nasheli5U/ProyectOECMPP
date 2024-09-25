@extends('layouts.app')

@section('title', 'Listado de Personas')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Listado de Personas</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <a href="{{ route('personas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Persona</a>

    <table class="min-w-full mt-4 bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Apellido</th>
                <th class="py-2 px-4 border-b">DNI</th>
                <th class="py-2 px-4 border-b">RUC</th>
                <th class="py-2 px-4 border-b">Domicilio Fiscal</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $persona->nombre }}</td>
                    <td class="py-2 px-4 border-b">{{ $persona->apellido }}</td>
                    <td class="py-2 px-4 border-b">{{ $persona->DNI }}</td>
                    <td class="py-2 px-4 border-b">{{ $persona->RUC }}</td>
                    <td class="py-2 px-4 border-b">{{ $persona->domicilio_fiscal }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('personas.edit', $persona->ID_persona) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('personas.destroy', $persona->ID_persona) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
