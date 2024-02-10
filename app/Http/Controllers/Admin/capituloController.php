<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\capitulo;

class capituloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capitulos = capitulo::all()->sortBy('orden');
        return view('admin.capitulos.index', compact('capitulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.capitulos.create');
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
            'titulo' => 'required',
            'literal' => 'required',
            'orden' => 'integer|required',
            'isPublic' => 'required'

        ],
        [
            'titulo' => 'El nombre del Capítulo es obligatorio',
            'orden' => 'Debe indicar un orden',
        ]);

        capitulo::create([
            'titulo' => $request->titulo,
            'orden' => $request->orden,
            'literal' => $request->literal,
            'isPublic' => $val
        ]);

        return redirect()->route('admin.capitulos.index')->with('info','El Capítulo se creo correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(capitulo $capitulo)
    {
        return view('admin.capitulos.edit', compact('capitulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, capitulo $capitulo)
    {


        $request->validate([
            'titulo' => 'required',
            'literal' => 'required',
            'orden' => 'required',
            'ispublic' => 'required'
        ],
        [
            'titulo' => 'El nombre del capítulo es obligatorio',
            'orden' => 'Debe indicar un orden',
        ]);

        $capitulo->update([
            'titulo' => $request->titulo,
            'literal' => $request->literal,
            'orden' => $request->orden,
            'ispublic' => $request->ispublic
        ]);


        return redirect()->route('admin.capitulos.index')->with('status','El Capítulo se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(capitulo $capitulo)
    {
        if(count($capitulo->categorias)>0) {
            return redirect()->back()->with('error', 'No se ha podido borrar este capitulo. (tiene categorias)');
        } else {
            $capitulo->delete();
            return redirect()->back()->with('status', 'El capítulo se elimino');
        }
    }
}
