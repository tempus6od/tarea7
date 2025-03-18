<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::with('asignatura')->get();
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        $asignaturas = Asignatura::all();
        return view('actividades.create', compact('asignaturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asignatura_id' => 'required|exists:asignaturas,id',
            'tipo' => 'required|string|max:255',
            'calificacion' => 'required|numeric|between:0,100',
            'fecha' => 'required|date',
            'comentarios' => 'nullable|string',
        ]);

        Actividad::create($request->all());
        return redirect()->route('actividades.index')->with('success', 'Actividad creada con éxito');
    }

    public function show(Actividad $actividad)
    {
        return view('actividades.show', compact('actividad'));
    }


    public function edit(Actividad $actividad)
    {
        $asignaturas = Asignatura::all();
        return view('actividades.edit', compact('actividad', 'asignaturas'));
    }

    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'asignatura_id' => 'required|exists:asignaturas,id',
            'tipo' => 'required|string|max:255',
            'calificacion' => 'required|numeric|between:0,100',
            'fecha' => 'required|date',
            'comentarios' => 'nullable|string',
        ]);

        $actividad->update($request->all());
        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada con éxito');
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada con éxito');
    }
}
