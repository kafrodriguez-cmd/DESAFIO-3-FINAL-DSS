<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = auth()->user()->tareas()->latest()->get();

        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable'
        ]);

        Tarea::create([
            'user_id' => auth()->id(),
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => 'Pendiente'
        ]);

        return redirect()
            ->route('tareas.index')
            ->with('success', 'Tarea creada correctamente');
    }

    public function show(Tarea $tarea)
    {
        //
    }

    public function edit(Tarea $tarea)
    {
        if ($tarea->user_id != auth()->id()) {
            abort(403);
        }

        return view('tareas.edit', compact('tarea'));
    }

    /**
     *  ACTUALIZADO CON SOPORTE AJAX 
     */
    public function update(Request $request, Tarea $tarea)
    {
        if ($tarea->user_id != auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'No autorizado'
            ], 403);
        }

        $request->validate([
            'titulo' => 'sometimes|required|max:255',
            'descripcion' => 'nullable',
            'estado' => 'sometimes|required'
        ]);

        $tarea->update([
            'titulo' => $request->titulo ?? $tarea->titulo,
            'descripcion' => $request->descripcion ?? $tarea->descripcion,
            'estado' => $request->estado ?? $tarea->estado
        ]);

        //  Si es AJAX responde JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Tarea actualizada correctamente',
                'tarea' => $tarea
            ]);
        }

        // 
        return redirect()
            ->route('tareas.index')
            ->with('success', 'Tarea actualizada');
    }

    /**
     *  DELETE 
     */
    public function destroy(Tarea $tarea)
    {
        if ($tarea->user_id != auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'No autorizado'
            ], 403);
        }

        $tarea->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Tarea eliminada'
            ]);
        }

        return redirect()
            ->route('tareas.index')
            ->with('success', 'Tarea eliminada');
    }
}