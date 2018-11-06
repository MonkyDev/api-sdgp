@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro de la carrera {{$carrera->nombreCarrera}}</h5>
                </div>

                <div class="card-body">
                    {!! Form::model($carrera, ['route' => ['career.update', $carrera->id], 'method' => 'PUT' ]) !!}
                        
                        @include('management.career.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.career.partials.error')
    @endif
</div>
<script>
    $(document).ready(function(){
        $("#autorizacion_id").val({{$carrera->autorizacion_id}});
        $("#institucion_id").val({{$carrera->institucion_id}});
        
    })
</script>
@endsection