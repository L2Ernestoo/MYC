@extends('layouts.template')


@section('contenido')
    @if($errors->has('numero_contenedor'))
        <div class="alert alert-danger">
            {{ $errors->first('numero_contenedor') }}</div>
    @endif
    <form action="{{route('ingresos.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Numero Contenedor</label>
                <input type="text" maxlength="11" required name="numero_contenedor" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Naviera</label>
                <select name="naviera" required class="custom-select">
                    <option value="" hidden>Selecciona naviera...</option>
                    @foreach($navieras as $naviera)
                        <option value="{{$naviera->id}}">{{$naviera->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Buque</label>
                <select name="buque" required class="custom-select">
                    <option value="" hidden>Selecciona Buque...</option>
                    @foreach($buques as $buque)
                        <option value="{{$buque->id}}">{{$buque->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Retención</label>
                <select name="retencion" class="custom-select">
                    <option value="" hidden>Selecciona Retención...</option>
                    @foreach($retenciones as $retencion)
                        <option value="{{$retencion->id}}">{{$retencion->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Contenedor</button>
    </form>
@endsection
