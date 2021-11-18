<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
    public function index(){

        return view('pages.revision.index');
    }

    public function generar(Request $request){
        $contenedor = Ingreso::join('contenedores', 'contenedores.id', '=', 'ingresos.contenedores_id')
            ->select('ingresos.*', 'contenedores.no_contenedor')
            ->where('contenedores.no_contenedor', $request->numero_contenedor)
            ->first();

        if($contenedor){
            if($contenedor->retenido == 1){
                $revision = Revision::where('ingresos_id', $contenedor->id)->first();

                if($revision){
                    if($revision->estatus == 1){
                        return redirect()->back()->with('mensaje','Este contenedor ya tiene una revisión en estado Pendiente');
                    }else{
                        return redirect()->back()->with('mensaje','Este contenedor ya tiene una revisión generada que fue aprobada');
                    }
                }else{
                    $newRevision = new Revision;
                    $newRevision->ingresos_id = $contenedor->id;
                    $newRevision->duca = $request->duca;
                    $newRevision->estatus = 1; //1 Pendiente - 2 - Aprobada
                    $newRevision->save();
                    return redirect()->back()->with('mensaje','Su solicitud de revision fue ingresada');
                }
            }else{
                return redirect()->back()->with('mensaje','El contenedor esta libre');
            }
        }else{
            return redirect()->back()->with('mensaje','El numero de contenedor no existe');
        }

    }

}
