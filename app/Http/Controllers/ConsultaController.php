<?php

namespace App\Http\Controllers;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(){
        return view('pages.clientes.index');
    }

    public function consulta(Request $request){
        $contenedor = Ingreso::join('contenedores', 'contenedores.id', '=', 'ingresos.contenedores_id')
            ->where('contenedores.no_contenedor', $request->numero_contenedor)
            ->first();

        if($contenedor){
            if($contenedor->retenido == 1){
                return redirect()->back()->with('mensaje','El contenedor esta retenido');
            }else{
                return redirect()->back()->with('mensaje','El contenedor esta libre');
            }
        }else{
            return redirect()->back()->with('mensaje','El numero de contenedor no existe');
        }
    }
}
