@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <h5> {{$institucion->nombre}} </h5>
                </div>

                <div class="card-body">
                    <i class="fas fa-university fa-5x text-success float-left"></i>
                    <p class="float-right">
                    Creado: {{ \FormatDateTime::LongTimeFilter($institucion->created_at)}}
                    <br>
                    Actualizado: {{ \FormatDateTime::LongTimeFilter($institucion->updated_at)}}
                    </p>
                    <div class="clearfix"></div>
                    <hr>
                    <p>
                        <label>Clave de la institución <strong>{{$institucion->clave}}</strong></label>
                        <br>
                        <label>De sostenimiento: <strong>{{$institucion->tipo_sostenimiento}}</strong></label>
                        <br>
                        <label>Se imparte: <strong>{{$institucion->tipo_educativo}}</strong></label>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.school.partials.error')
    @endif
</div>
@endsection