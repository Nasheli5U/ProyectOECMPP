<?php

namespace App\Http\Controllers;

use App\Models\Procedencia;
use Illuminate\Http\Request;

class ProcedenciaController extends Controller
{
    // Mostrar listado de procedencias
    public function index()
    {
        $procedencias = Procedencia::all();
        return view('procedencias.index', compact('procedencias'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('procedencias.create');
    }

    // Guardar nueva procedencia
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:procedencias,nombre',
        ]);

        try {
            Procedencia::create($request->all());
            return redirect()->route('procedencias.index')->with('success', 'Procedencia creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al crear la procedencia: ' . $e->getMessage());
        }
    }

    // Mostrar formulario de edición
    public function edit(Procedencia $procedencia) // Usar variable en singular
    {
        return view('procedencias.edit', compact('procedencia'));
    }

    // Actualizar procedencia
    public function update(Request $request, Procedencia $procedencia) // Usar variable en singular
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        try {
            $procedencia->update($request->all());
            return redirect()->route('procedencias.index')->with('success', 'Procedencia actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al actualizar la procedencia: ' . $e->getMessage());
        }
    }

    // Eliminar procedencia
    public function destroy(Procedencia $procedencia) // Usar variable en singular
    {
        try {
            $procedencia->delete();
            return redirect()->route('procedencias.index')->with('success', 'Procedencia eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al eliminar la procedencia: ' . $e->getMessage());
        }
    }
}
