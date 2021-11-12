<?php

namespace App\Http\Controllers;

use App\Models\Buque;
use App\Models\Contenedor;
use App\Models\Ingreso;
use App\Models\Naviera;
use App\Models\Retencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngresosController extends Controller
{
    public function index(){
        $navieras = Naviera::all();
        $buques = Buque::all();
        $retenciones = Retencion::all();
        return view('pages.ingreso', compact('navieras','buques', 'retenciones'));
    }

    public function all(){
        $ingresos = Ingreso::join('contenedores', 'contenedores.id', '=', 'ingresos.contenedores_id')
            ->join('navieras', 'navieras.id', '=', 'ingresos.navieras_id')
            ->join('buques', 'buques.id', '=', 'ingresos.buques_id')
            ->join('retenciones', 'retenciones.id', '=', 'ingresos.retenciones_id')
            ->select(
                'ingresos.*',
                'navieras.nombre as naviera',
                'buques.nombre as buque',
                'retenciones.nombre as retencion',
                'contenedores.no_contenedor as contenedor'
            )
            ->get();
        return view('pages.ingresos', compact('ingresos'));
    }

    public function store(Request $request){
        $request->validate([
            'numero_contenedor' => 'required|max:12',
            'naviera' => 'required',
            'buque' => 'required',
            ]);

        $contenedor = Contenedor::where('no_contenedor', $request->numero_contenedor)->first();

        if(empty($contenedor)){
            $contenedor = new Contenedor;
            $contenedor->no_contenedor = $request->numero_contenedor;
            $contenedor->save();
            $id_contenedor = $contenedor->id;
        }else{
            $id_contenedor = $contenedor->id;
        }

        $ingreso = new Ingreso;
        if(!empty($request->retencion)){
            $ingreso->retenciones_id = $request->retencion;
            $ingreso->retenido = 1; // 1 = Si | 2 = NO
        }else{
            $ingreso->retenido = 2;
        }
        $ingreso->users_id = Auth::user()->id;
        $ingreso->navieras_id = $request->naviera;
        $ingreso->contenedores_id = $id_contenedor;
        $ingreso->buques_id = $request->buque;
        $ingreso->save();

    }
}
