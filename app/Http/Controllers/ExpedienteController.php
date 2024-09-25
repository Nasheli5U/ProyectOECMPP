<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Persona;
use App\Models\Procedencia;
use App\Models\Infraccion;
use Illuminate\Http\Request;
use PDF; // Asegúrate de que esta librería esté instalada con composer

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::with('persona', 'procedencia', 'infraccion')->get();
        return view('expedientes.index', compact('expedientes'));
    }

    public function show(Expediente $expedientes)
    {
        return view('expedientes.show', compact('expediente'));
    }

    public function create()
    {
        $personas = Persona::all();
        $procedencias = Procedencia::all();
        $infracciones = Infraccion::all();
        $numero_expediente = $this->generateExpedienteNumber();

        return view('expedientes.create', compact('personas', 'procedencias', 'infracciones', 'numero_expediente'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'ID_persona' => 'required|exists:personas,ID_persona',
            'direccion_predio' => 'required|string|max:255',
            'ID_procedencia' => 'required|exists:procedencias,ID_procedencia',
            'fecha_entrada' => 'required|date',
            'fecha_notificacion' => 'nullable|date',
            'ID_infraccion' => 'required|exists:infracciones,ID_infraccion',
            'medida_complementaria' => 'nullable|string|max:255',
        ]);

        // Creación del expediente
        $expedientes = Expediente::create([
            'numero' => $this->generateExpedienteNumber(),
            'ID_persona' => $request->ID_persona,
            'direccion_predio' => $request->direccion_predio,
            'ID_procedencia' => $request->ID_procedencia,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_notificacion' => $request->fecha_notificacion,
            'ID_infraccion' => $request->ID_infraccion,
            'estado' => 'REC',
            'medida_complementaria' => $request->medida_complementaria,
        ]);

        // Generar PDF
        $pdf = PDF::loadView('pdf.expediente', [
            'expediente' => $expedientes,
            'persona' => $expedientes->persona,
            'procedencia' => $expedientes->procedencia,
            'infraccion' => $expedientes->infraccion
        ]);

        // Guardar o descargar el PDF
        return $pdf->download("Expediente_{$expedientes->numero}.pdf")->withHeaders([
            'Location' => route('expedientes.create') // Redirigir a la página de creación de expedientes
        ]);

    }

    private function generateExpedienteNumber()
    {
        $lastExpediente = Expediente::orderBy('ID_expediente', 'desc')->first();

        if ($lastExpediente) {
            $lastNumber = intval(substr($lastExpediente->numero, 0, 4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        $currentYear = date('Y');
        return "{$newNumber}-{$currentYear}-OEC-MPP";
    }

    
    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);
        $personas = Persona::all();
        $procedencias = Procedencia::all();
        $infracciones = Infraccion::all();
    
        return view('expedientes.edit', compact('expediente', 'personas', 'procedencias', 'infracciones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_persona' => 'required|exists:personas,ID_persona',
            'direccion_predio' => 'required|string|max:255',
            'ID_procedencia' => 'required|exists:procedencias,ID_procedencia',
            'ID_infraccion' => 'required|exists:infracciones,ID_infraccion',
            'medida_complementaria' => 'nullable|string|max:255',
        ]);
    
        $expediente = Expediente::findOrFail($id);
        $expediente->update($request->all());
    
        return redirect()->route('expedientes.index')->with('success', 'Expediente actualizado exitosamente.');
    }
    
    
    public function editEstado($id)
    {
        $expediente = Expediente::findOrFail($id);
        return view('expedientes.edit_estado', compact('expediente'));
    }

    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:REC,REEF,RC,RSEC',
            'fecha_notificacion' => 'nullable|date',
        ]);
    
        $expediente = Expediente::findOrFail($id);
        $expediente->update([
            'estado' => $request->estado,
            'fecha_notificacion' => $request->fecha_notificacion,
        ]);
    
        return redirect()->route('expedientes.index')->with('success', 'Estado del expediente actualizado exitosamente.');
    }
    

    public function destroy($id)
    {
        $expediente = Expediente::findOrFail($id);
        $expediente->delete();

        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado exitosamente.');
    }

    public function baja($id)
{
    $expediente = Expediente::findOrFail($id);
    $expediente->update(['estado' => 'Baja']);

    return redirect()->route('expedientes.index')->with('success', 'Expediente dado de baja definitiva exitosamente.');
}

    // Métodos de edición y eliminación permanecen igual
}
