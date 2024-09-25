@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Agregar Pago</h1>

    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="procedimiento" class="block text-sm font-medium text-gray-700">Procedimiento</label>
            <input type="text" id="procedimiento" name="procedimiento" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
            <input type="number" id="monto" name="monto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar Pago</button>
    </form>
</div>
@endsection
