@extends('layouts.template')


@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SOLICITUD DE REVISIONES</h6>
        </div>
        @if(session()->has('mensaje'))
            <div class="alert alert-success">
                {{ session()->get('mensaje') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Contenedor</th>
                        <th>Buque</th>
                        <th>Naviera</th>
                        <th>Fecha</th>
                        <th>Retencion</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach($revisiones as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->contenedor}}</td>
                            <td>{{$item->buque}}</td>
                            <td>{{$item->naviera}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->retencion}}</td>
                            <td><a href="{{route('revisiones.aprobar', $item->id_revision)}}" class="btn btn-primary btn-sm">Aprobar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
