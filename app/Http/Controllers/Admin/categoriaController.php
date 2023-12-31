<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** InDEXE PRUEBA GITHUB */
        $categorias = categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('isPublic')) {
            $val = true;
        } else {

            $val= false;

        };

        $request->validate([
            'title' => 'required',
            'orden' => 'required',

        ],
        [
            'title' => 'El nombre de la Categoría es obligatorio',
            'orden' => 'Debe indicar un orden',
        ]);

        categoria::create([
            'title' => $request->title,
            'orden' => $request->orden,
            'isPublic' => $val
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
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categoria $categoria)
    {
        if($request->has('isPublic')) {
            $val = true;
        } else {

            $val= false;

        };

        $request->validate([
            'title' => 'required',
            'orden' => 'required',

        ],
        [
            'title' => 'El nombre de la Categoría es obligatorio',
            'orden' => 'Debe indicar un orden',
        ]);

        $categoria->update([
            'title' => $request->title,
            'orden' => $request->orden,
            'isPublic' => $val
        ]);

        return redirect()->route('admin.categorias.edit',$categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria $categoria)
    {
        //
    }
}
