<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use App\Models\Expediente;
use App\Models\Pago;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    public function create()
    {
        $expedientes = Expediente::all();
        $pagos = Pago::all();
        return view('comprobantes.create', compact('expedientes', 'pagos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_expediente' => 'required|exists:expedientes,ID_expediente',
            'numero_recibo' => 'required|unique:comprobantes,numero_recibo',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
            'pagos' => 'required|array',
            'pagos.*' => 'required|exists:pagos,ID_pago'
        ]);

        // Crear el comprobante
        $comprobante = Comprobante::create([
            'ID_expediente' => $request->ID_expediente,
            'numero_recibo' => $request->numero_recibo,
            'fecha' => $request->fecha,
            'total' => $request->total,
        ]);

        // Agregar detalles de pagos
        foreach ($request->pagos as $id_pago) {
            $pago = Pago::find($id_pago);
            $comprobante->detalles()->create([
                'ID_pago' => $id_pago,
                'monto_pago' => $pago->monto, // Puedes ajustar esto si deseas recibir un monto específico
            ]);
        }

        return redirect()->route('comprobantes.create')->with('success', 'Comprobante creado exitosamente.');
    }
}
