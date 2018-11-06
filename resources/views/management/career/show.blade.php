@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <h5> {{$carrera->nivel.' '.$carrera->nombreCarrera}} </h5>
                </div>

                <div class="card-body">
                    <i class="fas fa-university fa-5x text-success float-left"></i>
                    <p class="float-right">
                    Creado: {{ \FormatDateTime::LongTimeFilter($carrera->created_at)}}
                    <br>
                    Actualizado: {{ \FormatDateTime::LongTimeFilter($carrera->updated_at)}}
                    </p>
                    <div class="clearfix"></div>
                    <hr>
                    <p>
                        <label>Clave: <strong>{{$carrera->cveCarrera}}</strong></label>
                        <br>
                        <label>Modalidad: <strong>{{$carrera->modalidad}}</strong></label>
                        <br>
                        <label>Revoe: <strong>{{$carrera->noRevoe}}</strong></label>
                        <br>
                        <label>Institución: <strong>{{$carrera->institucion->nombre}}</strong></label>
                        <br>
                        <label>Autorización: <strong>{{$carrera->autorizacion->desc_autorizacion}}</strong></label>
                        <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.career.partials.error')
    @endif
</div>
@endsection