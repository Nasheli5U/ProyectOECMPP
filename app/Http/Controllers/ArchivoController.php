<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    public function showSearchForm()
    {
        $expedientes = Expediente::all();
        return view('archivos.index', compact('expedientes'));
    }

    public function index(Request $request)
    {
        // Recuperar todos los expedientes
        $expedientes = Expediente::all();

        // Inicializar variables para la vista
        $expedienteSeleccionado = null;
        $archivos = collect(); // Usar una colección vacía para evitar errores
        $comprobantes = collect(); // Usar una colección vacía para evitar errores

        // Si se ha enviado un ID de expediente, buscar el expediente específico
        if ($request->has('ID_expediente') && $request->input('ID_expediente') != '') {
            $expedienteSeleccionado = Expediente::with(['archivos', 'comprobantes'])
                ->find($request->input('ID_expediente'));

            if ($expedienteSeleccionado) {
                // Obtener archivos y comprobantes asociados al expediente seleccionado
                $archivos = $expedienteSeleccionado->archivos;
                $comprobantes = $expedienteSeleccionado->comprobantes;
            }
        }

        // Pasar datos a la vista
        return view('archivos.index', compact('expedientes', 'expedienteSeleccionado', 'archivos', 'comprobantes'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'ID_expediente' => 'required|exists:expedientes,ID_expediente',
            'file' => 'required|file|mimes:pdf,jpg,png,docx|max:2048',
            'tipo_archivo' => 'required|in:REC,REEF,RC,RSEC,otros',
        ]);

        // Obtener el expediente seleccionado
        $expediente = Expediente::findOrFail($request->ID_expediente);

        // Manejar la carga de archivos
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/archivos', $fileName);

            // Crear el registro de archivo
            Archivo::create([
                'ID_expediente' => $expediente->ID_expediente,
                'nombre_archivo' => $fileName,
                'tipo_archivo' => $request->tipo_archivo,
            ]);
        }

        return redirect()->route('archivos.index', ['ID_expediente' => $expediente->ID_expediente])
            ->with('success', 'Archivo agregado correctamente.');
    }
}

