<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\idioma;

class Idiomas extends Controller
{
    public function index()
    {
        $idiomas = idioma::all();
        return view('admin.idiomas.index', compact('idiomas'));
    }
}
