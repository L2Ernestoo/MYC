<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MYC - CONSULTAS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;;
        font-size: 14px;
        line-height: 20px;
        max-height: 100%;
        width: 100%;
        max-width: 100%;
    }

    .field {
        font-size: 15px;
    }

    .text-data {
        font-size: 14px;
    }

    @page {
        margin-top: 0.5cm;
        margin-bottom: 2cm;
        margin-left: 2cm;
        margin-right: 1cm;
    }

    .separador {
        border-bottom: #3f9ae5;
        border-bottom-width: thick;
    }

    .layer1 {
        margin-top: 10px;
    }

    .layer2 {
        margin-top: 20px;
    }

    .bg-azul {
        background: #ad3b3b;
        height: 3px;
    }

    #watermark {
        position: fixed;
        bottom: 10cm;
        opacity: 0.3;
        left: 3cm;
        width: 12cm;
        height: 8cm;
        z-index: -1000;
    }
    footer {
        position: fixed;
        bottom: -115px;
        left: 0px;
        right: 0px;
        height: 450px;
    }
    #type {
        position: fixed;
        top: 3.7cm;
        left: 15.7cm;
    }
</style>
<body>
<div id="watermark">
    <img src="https://i.imgur.com/XBHCcQk.png" height="100%" width="100%" />
</div>
<div class="row">
    <div style="color: #a23636; margin-top: 15px; font-size: 25px;" class="text-center text-red-700">
        @if($contenedor->retenido == 1)
            RETENIDO
        @else
            LIBERADO
        @endif
    </div>
</div>
    <div class="bg-azul mb-4"></div>
<div class="row mt-4" style="margin-top:25px!important;">
    <div class="col-xs-6 field">
       NO REVISION: {{$contenedor->id}} @isset($newRevision) / Duca: {{$newRevision->duca}} @endisset
    </div>
    <div class="col-xs-6 field">
        CONTENEDOR: {{$contenedor->no_contenedor}}
    </div>
</div>
<div class="row mt-4" style="margin-top:25px!important;">
    <div class="col-xs-6 field">
        NAVIERA: {{$contenedor->naviera}}
    </div>
    <div class="col-xs-6 field">
        BUQUE: {{$contenedor->buque}}
    </div>
</div>
<div class="row mt-4" style="margin-top:25px!important;">
    <div class="col-xs-6 field">
        RETENCION: {{$contenedor->retencion}}
    </div>
    <div class="col-xs-6 field">
        FECHA: {{$contenedor->created_at}}
    </div>
</div>
<div class="row">
    <div style="color: #a23636; margin-top: 15px; font-size: 14px;" class="text-center text-red-700">
        DOCUMENTO UNICO DE IDENTIFICACIÓN PARA ELABORAR REVISION EN RAMPA. <br>
        {{base64_encode(md5($contenedor->id))}}
    </div>
</div>
</body>
</html>
