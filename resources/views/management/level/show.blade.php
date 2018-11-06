@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <h5> Nivel educativo </h5>
                </div>

                <div class="card-body">
                    <i class="fas fa-university fa-5x text-success float-left"></i>
                    <p class="float-right">
                    Creado: {{ \FormatDateTime::LongTimeFilter($nivel->created_at)}}
                    <br>
                    Actualizado: {{ \FormatDateTime::LongTimeFilter($nivel->updated_at)}}
                    </p>
                    <div class="clearfix"></div>
                    <hr>
                    <p>
                        <label>Descripción <strong>{{$nivel->desc_nivel}}</strong></label>
                        <br>
                        <label>Tipo: <strong>{{$nivel->tipo_nivel}}</strong></label>
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