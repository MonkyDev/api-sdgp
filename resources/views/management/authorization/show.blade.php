@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <h5> Autorización escolar </h5>
                </div>

                <div class="card-body">
                    <i class="fas fa-university fa-5x text-success float-left"></i>
                    <p class="float-right">
                    Creado: {{ \FormatDateTime::LongTimeFilter($autorizacion->created_at)}}
                    <br>
                    Actualizado: {{ \FormatDateTime::LongTimeFilter($autorizacion->updated_at)}}
                    </p>
                    <div class="clearfix"></div>
                    <hr>
                    <p>
                        <label>Descripción <strong>{{$autorizacion->desc_autorizacion}}</strong></label>
                        <br>
                        <label>Estatus: <strong>{{($autorizacion->edo == 1)? 'Activo' : 'Sin uso' }}</strong></label>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.authorization.partials.error')
    @endif
</div>
@endsection