<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\document;
use Illuminate\Support\Str;
class DocumentController extends Controller
{
    public function index()
    {
        $documents = document::all();
        return view('admin.documentos.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'orden' => 'required',
            'texto' => 'required'
        ],
        [
            'titulo' => 'Debes introducir un titulo para el documento',
            'orden' => 'Debes introducir un numero de orden',
            'texto' => 'Debes introdicir el texto',
        ]);

        $documento = new document();
        $documento->titulo = $request->titulo;
        $documento->orden = $request->orden;
        $documento->html = $request->texto;
        $documento->grupo = "1";
        $documento->slug = Str::slug($request->titulo);
        $documento->save();
        return redirect()->route('admin.documentos.index');
    }

    public function edit(document $documento) {

        return view('admin.documentos.edit',compact('documento'));
    }

    public function update(Request $request,document $documento) {
        $request->validate([
            'titulo' => 'required',
            'orden' => 'required',
            'texto' => 'required'
        ],
        [
            'titulo' => 'Debes introducir un titulo para el documento',
            'orden' => 'Debes introducir un numero de orden',
            'texto' => 'Debes introdicir el texto',
        ]);

        $documento->titulo = $request->titulo;
        $documento->orden = $request->orden;
        $documento->html = $request->texto;
        $documento->slug = Str::slug($request->titulo);
        $documento->save();
        return redirect()->route('admin.documentos.index');
    }
    public function destroy(document $documento)
    {
        $documento->delete();
        return redirect()->route('admin.documentos.index')->with('eliminar','ok');
    }


}
