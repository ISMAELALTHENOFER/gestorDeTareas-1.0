<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Categoria::all();

        return view('categories.index', ['categorias' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias|max:50', //valida una categoria unica requerida y un maximo de 50 caracteres
            'color' => 'required|max:7', //valida una color requerido y maximo de 7 caracteres
        ]);

        $categoria = new Categoria; //crea nueva categoria
        $categoria->nombre = $request->nombre; //inserta nombre
        $categoria->color = $request->color; //inserta color
        $categoria->save(); //guardar categ

        return redirect()->route('categoria.index')->with('success', 'Categoria creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categoria::find($id);
        return view('categories.show', ['categoria' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Categoria::find($id);
        $category->nombre = $request->nombre; //edita el nombre
        $category->color = $request->color; //edita el color
        $category->save(); //guarda la categoria modificada
        return redirect()->route('categoria.index')->with('success', 'Categoria actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categoria::find($id);
        $category->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoria Eliminada!');
    }
}
