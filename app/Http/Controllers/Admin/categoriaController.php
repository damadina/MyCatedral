<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\capitulo;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** InDEXE PRUEBA GITHUB */

        $categorias = categoria::all()->sortBy('NameCapitulo');
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $capitulos = capitulo::all()->sortBy('orden');
        return view('admin.categorias.create', compact('capitulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'orden' => 'integer|required',
            'isPublic' => 'required'

        ],
        [
            'title' => 'El nombre de la Categoría es obligatorio',
            'orden' => 'Debe indicar un orden',
        ]);

        categoria::create([
            'title' => $request->title,
            'orden' => $request->orden,
            'isPublic' => $request->isPublic,
            'capitulo_id' => $request->capitulo_id
        ]);

        return redirect()->route('admin.categorias.index')->with('info','La Categoría se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        $capitulos = capitulo::all()->sortBy('orden');
        return view('admin.categorias.edit', compact('categoria','capitulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categoria $categoria)
    {



        $request->validate([
            'title' => 'required',
            'orden' => 'required',
            'isPublic' => 'required'

        ],
        [
            'title' => 'El nombre de la Categoría es obligatorio',
            'orden' => 'Debe indicar un orden',
        ]);

        $categoria->update([
            'title' => $request->title,
            'orden' => $request->orden,
            'isPublic' => $request->isPublic,
            'capitulo_id' => $request->capitulo_id
        ]);


        return redirect()->route('admin.categorias.index')->with('status','La Categoría se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria $categoria)
    {

        if(count($categoria->elementos)>0) {
            return redirect()->back()->with('error', 'No se ha podido borrar esta categoría. (tiene posts)');
        } else {
            $categoria->delete();
            return redirect()->back()->with('status', 'La categoria se elimino');
        }

    }
}
