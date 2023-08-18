<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    /**index para mostrar todas las tareas
    store para guardar una tarea
    update para actualizar una tarea
    destroy para eliminar
    edit para editar */

    public function store(Request $request)
    {
        // Validamos lo que recibimos, en este caso es solo requerido
        $request->validate([
            'titulo' => 'required'
        ]);
        //creamos un nuevo objeto tarea y asignamos los valores ingresados a la columna
        $tarea = new Tarea;
        $tarea->titulo = $request->titulo;
        $tarea->save();
        //redireccionamos y damos aviso que de secess
        return redirect()->route('home')->with('success', 'Tarea creada correctamente');
    }
    public function index()
    {
        $tarea = Tarea::all();
        return view('tareas.tareas', ['tarea' => $tarea]);
    }
}
