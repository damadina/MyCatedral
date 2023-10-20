<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElementosIndex extends Controller
{
    public function index()
    {
        return view('admin.fotos.index');
    }
}
