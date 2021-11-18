<?php

namespace App\Http\Controllers;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ConsultaController extends Controller
{
    public function index(){
        return view('pages.clientes.index');
    }

    public function consulta(Request $request){
        $contenedor = Ingreso::join('contenedores', 'contenedores.id', '=', 'ingresos.contenedores_id')
            ->join('navieras', 'navieras.id', '=', 'ingresos.navieras_id')
            ->join('buques', 'buques.id', '=', 'ingresos.buques_id')
            ->join('retenciones', 'retenciones.id', '=', 'ingresos.retenciones_id')
            ->select('ingresos.*', 'contenedores.no_contenedor', 'buques.nombre as buque', 'navieras.nombre as naviera', 'retenciones.nombre as retencion')
            ->where('contenedores.no_contenedor', $request->numero_contenedor)
            ->first();

        if($contenedor){
            if($contenedor->retenido == 1){
                $view = view('pdf.consulta', compact('contenedor'));

                return PDF::loadHTML($view)
                    ->setPaper('letter')
                    ->download('CONSULTA-'.$contenedor->id.'.pdf');
//                return redirect()->back();
            }else{
                $view = view('pdf.consulta', compact('contenedor'));

                return PDF::loadHTML($view)
                    ->setPaper('letter')
                    ->download('CONSULTA-'.$contenedor->id.'.pdf');
                //return redirect()->back()->with('mensaje','El contenedor esta libre');
            }
        }else{
            return redirect()->back()->with('mensaje','El numero de contenedor no existe');
        }
    }
}
