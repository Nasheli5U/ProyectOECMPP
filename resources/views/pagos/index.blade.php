@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Listado de Pagos</h1>

    <a href="{{ route('pagos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Agregar Pago</a>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="px-6 py-3 text-left">ID</th>
                <th class="px-6 py-3 text-left">Procedimiento</th>
                <th class="px-6 py-3 text-left">Monto</th>
                <th class="px-6 py-3 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
            @foreach ($pagos as $pago)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3">{{ $pago->id }}</td>
                    <td class="px-6 py-3">{{ $pago->procedimiento }}</td>
                    <td class="px-6 py-3">{{ $pago->monto }}</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('pagos.edit', $pago) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">Editar</a>
                        <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
