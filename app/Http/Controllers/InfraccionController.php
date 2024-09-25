<?php

namespace App\Http\Controllers;

use App\Models\Infraccion;
use Illuminate\Http\Request;

class InfraccionController extends Controller
{
    // Listar todas las infracciones
    public function index()
    {
        $infracciones = Infraccion::all();
        return view('infracciones.index', compact('infracciones'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('infracciones.create');
    }

    // Guardar una nueva infracción
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:255|unique:infracciones,codigo',
            'descripcion' => 'required|string',
            'monto' => 'required|numeric',
        ]);

        try {
            Infraccion::create($request->all());
            return redirect()->route('infracciones.index')->with('success', 'Infracción creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al crear la infracción: ' . $e->getMessage());
        }
    }

    // Mostrar formulario de edición
    public function edit(Infraccion $infraccion)
    {
        return view('infracciones.edit', compact('infraccion'));
    }

    // Actualizar una infracción existente
    public function update(Request $request, $ID_infraccion)
    {
        // Encuentra la infracción y actualiza
        $infraccion = Infraccion::findOrFail($ID_infraccion);
        $infraccion->update($request->all());
    
        return redirect()->route('infracciones.index')->with('success', 'Infracción actualizada con éxito.');
    }
    
    

    // Eliminar una infracción
    public function destroy(Infraccion $infraccion)
    {
        try {
            $infraccion->delete();
            return redirect()->route('infracciones.index')->with('success', 'Infracción eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al eliminar la infracción: ' . $e->getMessage());
        }
    }
}
