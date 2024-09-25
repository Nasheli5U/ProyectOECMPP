@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Agregar Recibo</h1>

    <form action="{{ route('comprobantes.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="ID_expediente" class="block text-sm font-medium text-gray-700">Expediente</label>
            <select id="ID_expediente" name="ID_expediente" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach ($expedientes as $expediente)
                    <option value="{{ $expediente->ID_expediente }}">{{ $expediente->numero }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="numero_recibo" class="block text-sm font-medium text-gray-700">Número de Recibo</label>
            <input type="text" id="numero_recibo" name="numero_recibo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Seleccionar Pagos</h2>
            <div class="border border-gray-300 rounded-md p-4 bg-gray-50">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Procedimiento</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Agregar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($pagos as $pago)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pago->procedimiento }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ number_format($pago->monto, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button" class="add-to-comprobante bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" data-id="{{ $pago->ID_pago }}" data-monto="{{ $pago->monto }}" data-procedimiento="{{ $pago->procedimiento }}">Agregar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Pagos Seleccionados</h2>
            <div id="selected-payments" class="border border-gray-300 rounded-md p-4 bg-gray-50">
                <!-- Aquí se mostrarán los pagos seleccionados -->
            </div>
        </div>

        <div class="mb-4">
            <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
            <input type="text" id="total" name="total" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar Comprobante</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectedPaymentsContainer = document.getElementById('selected-payments');
        const totalInput = document.getElementById('total');
        let total = 0;

        document.querySelectorAll('.add-to-comprobante').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const monto = parseFloat(button.getAttribute('data-monto'));
                const procedimiento = button.getAttribute('data-procedimiento');

                const paymentHTML = `
                    <div class="flex justify-between items-center mb-2">
                        <span>${procedimiento} - ${monto.toFixed(2)}</span>
                        <button type="button" class="remove-payment bg-red-500 text-white px-2 py-1 rounded" data-id="${id}" data-monto="${monto}">Eliminar</button>
                        <input type="hidden" name="pagos[]" value="${id}">
                    </div>
                `;

                selectedPaymentsContainer.insertAdjacentHTML('beforeend', paymentHTML);

                total += monto;
                totalInput.value = total.toFixed(2);
            });
        });

        selectedPaymentsContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-payment')) {
                const monto = parseFloat(e.target.getAttribute('data-monto'));

                total -= monto;
                totalInput.value = total.toFixed(2);

                e.target.parentElement.remove();
            }
        });
    });
</script>
@endsection
