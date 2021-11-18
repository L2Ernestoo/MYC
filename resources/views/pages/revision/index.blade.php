@extends('layouts.cliente')
@section('contenido')
    <form action="{{route('revision.generar')}}" method="post">
        @csrf
        <div class="row">
            <div class="offset-md-3 col-md-5">
                <div class="alert alert-success">
                    <p>
                        <b>SOLICITUD DE REVISION: </b> Formulario para solicitar la revisión del contenedor.
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
                <div class="form-group">
                    <label>Duca</label>
                    <input type="text" maxlength="11" required name="duca" class="form-control">
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
