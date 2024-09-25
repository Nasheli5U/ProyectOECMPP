<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Procedencia;
use Illuminate\Http\Request;
use PDF; // Asegúrate de que esta librería esté instalada con composer

class ReporteController extends Controller
{
    public function index()
    {
        $procedencias = Procedencia::all();
        return view('reportes.index', compact('procedencias'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'dni' => 'nullable|string',
            'nombre' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'procedencia' => 'nullable|exists:procedencias,ID_procedencia',
            'con_comprobante' => 'nullable|boolean',
        ]);

        $query = Expediente::with('persona', 'procedencia', 'infraccion');

        if ($request->filled('dni')) {
            $query->whereHas('persona', function($q) use ($request) {
                $q->where('DNI', $request->dni);
            });
        }

        if ($request->filled('nombre')) {
            $query->whereHas('persona', function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->nombre . '%');
            });
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_entrada', [$request->fecha_inicio, $request->fecha_fin]);
        }

        if ($request->filled('procedencia')) {
            $query->where('ID_procedencia', $request->procedencia);
        }

        if ($request->filled('con_comprobante')) {
            $query->whereHas('comprobantes');
        }

        $expedientes = $query->get();

        $pdf = PDF::loadView('pdf.reportes', ['expedientes' => $expedientes]);

        return $pdf->download('Reporte_Expedientes.pdf');
    }
}
