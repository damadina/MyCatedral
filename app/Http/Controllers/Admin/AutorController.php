<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\autor;
use Illuminate\Support\Facades\Storage;
use File;

class AutorController extends Controller
{

    public function index()
    {
        $autores = autor::all();
        return view('admin.autores.index', compact('autores'));
    }


    public function create()
    {
        return view('admin.autores.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'departamento' => 'required',
            'bio' => 'required'
        ],
        [
            'name' => 'Debes introducir un nombre',
            'departamento' => 'Debes introducir un departamento'
        ]);

        $autor = autor::create([
            'name' => $request->name,
            'departamento' => $request->departamento,
            'bio' => $request->bio,
            'web' => $request->web,
        ]);

        if($request->hasFile('fotoUrl')) {
            $file = $request->file('fotoUrl');
            $extension = $file->getClientOriginalExtension();
            $name = time().'-'.$file->getClientOriginalName();
            $uploadSucces = $request->file('fotoUrl')->move('storage/autores/',$name);
            $autor->fotoUrl = $name;
        }
        $autor->save();

        return redirect()->route('admin.autores.index')->with('info','El autor se creo correctamente');
    }


    public function show(string $id)
    {
        dd("show");
    }


    public function edit(autor $autor)
    {
        return view('admin.autores.edit',compact('autor'));
    }


    public function update(Request $request, autor $autor)
    {

        $request->validate([
            'name' => 'required',
            'departamento' => 'required',
            'bio' => 'required'
        ],
        [
            'name' => 'Debes introducir un nombre',
            'departamento' => 'Debes aintroducir un departamento'
        ]);



        if($request->hasFile('fotoUrl')) {
            if(Storage::exists('public/autores/'.$autor->fotoUrl)){
                Storage::delete('public/autores/'.$autor->fotoUrl);
            }

            $file = $request->file('fotoUrl');

            $name = time().'-'.$file->getClientOriginalName();
            $request->file('fotoUrl')->move('storage/autores/',$name);
            $autor->fotoUrl = $name;
        }

        $autor->name = $request->name;
        $autor->departamento = $request->departamento;
        $autor->bio = $request->bio;
        $autor->web = $request->web;
        $autor->update();
        return redirect()->route('admin.autores.index')->with('info','El autor se modifico correctamente');
    }


    public function destroy(autor $autor)
    {

        if(Storage::exists('public/autores/'.$autor->fotoUrl)){
            Storage::delete('public/autores/'.$autor->fotoUrl);
        }
        $autor->delete();

        return redirect()->route('admin.autores.index')->with('eliminar','ok');
    }


}
