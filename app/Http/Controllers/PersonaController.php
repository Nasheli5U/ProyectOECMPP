<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // Mostrar listado de personas
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('personas.create');
    }

    // Guardar nueva persona
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'DNI' => 'required|numeric|digits:8|unique:personas,DNI',
            'RUC' => 'nullable|numeric|digits:11|unique:personas,RUC',
            'domicilio_fiscal' => 'nullable|string|max:255',
        ]);

        try {
            Persona::create([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'DNI' => $request->input('DNI'),
                'RUC' => $request->input('RUC'),
                'domicilio_fiscal' => $request->input('domicilio_fiscal'),
            ]);
            return redirect()->route('personas.index')->with('success', 'Persona creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al crear la persona: ' . $e->getMessage());
        }
    }

    // Mostrar formulario de edición
    public function edit($ID_persona)
    {
        $persona = Persona::findOrFail($ID_persona);
        return view('personas.edit', compact('persona'));
    }

    // Actualizar persona
    public function update(Request $request, $ID_persona)
    {
        $persona = Persona::findOrFail($ID_persona);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'DNI' => 'required|numeric|digits:8|unique:personas,DNI,' . $persona->ID_persona,
            'RUC' => 'nullable|numeric|digits:11|unique:personas,RUC,' . $persona->ID_persona,
            'domicilio_fiscal' => 'nullable|string|max:255',
        ]);

        try {
            $persona->update([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'DNI' => $request->input('DNI'),
                'RUC' => $request->input('RUC'),
                'domicilio_fiscal' => $request->input('domicilio_fiscal'),
            ]);
            return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al actualizar la persona: ' . $e->getMessage());
        }
    }

    // Eliminar persona
    public function destroy($ID_persona)
    {
        $persona = Persona::findOrFail($ID_persona);

        try {
            $persona->delete();
            return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error al eliminar la persona: ' . $e->getMessage());
        }
    }
}
