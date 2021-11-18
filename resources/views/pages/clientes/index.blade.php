@extends('layouts.cliente')
@section('contenido')
    <form action="{{route('consultar.retenido')}}" method="post">
        @csrf
        <div class="row">
            <div class="offset-md-3 col-md-5">
                <div class="alert alert-success">
                    <p>
                        <b>CONSULTA DE CONTENEDOR: </b> Ingrese el numero contenedor para conocer el estatus si esta
                        retenido o no.
                    </p>
                </div>
                @if(session()->has('mensaje'))
                    <div class="alert alert-success">
                        {{ session()->get('mensaje') }}
                    </div>
                @endif
                <div class="form-group">
                    <label>Numero Contenedor</label>
                    <input type="text" maxlength="11" required name="numero_contenedor" class="form-control">
                </div>
            </div>
            <div class="offset-md-3 col-md-5">
                <button type="submit" class="btn btn-primary btn-block consulta"><i class="fas fa-search-dollar"></i>
                    Consultar
                </button>
            </div>
        </div>
    </form>
@endsection
