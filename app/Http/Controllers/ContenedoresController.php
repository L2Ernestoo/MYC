<?php

namespace App\Http\Controllers;

use App\Models\Contenedor;
use Illuminate\Http\Request;

class ContenedoresController extends Controller
{
    public function index(){
        $contenedores = Contenedor::all();

        return view('pages.contenedores.index', compact('contenedores'));
    }
}
