@extends('layouts.template')


@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">INGRESOS</h6>
        </div>
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
                        <th>Estado</th>
                        <th>Retencion</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach($ingresos as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->contenedor}}</td>
                            <td>{{$item->buque}}</td>
                            <td>{{$item->naviera}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                @if($item->retenido == 1)
                                    Retenido
                                @else
                                    Liberado
                                @endif
                            </td>
                            <td>{{$item->retencion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
