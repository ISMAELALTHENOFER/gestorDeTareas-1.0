<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    /**index para mostrar todas las tareas
    store para guardar una tarea
    update para actualizar una tarea
    destroy para eliminar*/

    public function index()
    {
        $tarea = Tarea::all();
        return view('tareas.tareas', ['tarea' => $tarea]);
    }               //carpeta.vista

    public function store(Request $request)
    {
        // Validamos lo que recibimos, en este caso es requerido y un minimo de cuatro letras
        $request->validate([
            'titulo' => 'required|min:4'

        ]);
        //creamos un nuevo objeto tarea y asignamos los valores ingresados a la columna
        $tarea = new Tarea;
        $tarea->titulo = $request->titulo;
        $tarea->save();
        //redireccionamos y damos aviso que de success 
        return redirect()->route('home')->with('success', 'Tarea creada con exito');
    }


    public function show($id)
    {
        $tarea = Tarea::find($id);
        return view('tareas.show', ['tarea' => $tarea]);
    }

    public function update(Request $request, $id)//modifica la tarea
    {
        $tarea = Tarea::find($id);
        $tarea->titulo = $request->titulo;
        $tarea->save();

        return redirect()->route('home')->with('success', 'Tarea actualizada con exito');
    }
    public function destroy($id) //function para eliminar una tarea
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return redirect()->route('home')->with('success', 'Tarea Eliminada con exito');
    }
}
