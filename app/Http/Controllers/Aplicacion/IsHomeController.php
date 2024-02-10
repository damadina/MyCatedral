<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IsHomeController extends Controller
{
    public function index() {

        return view('aplicacion.isHome');
    }
}
