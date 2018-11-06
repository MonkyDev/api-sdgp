@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <h5> Fundamento legal del servicio social </h5>
                </div>

                <div class="card-body">
                    <i class="fas fa-university fa-5x text-success float-left"></i>
                    <p class="float-right">
                    Creado: {{ \FormatDateTime::LongTimeFilter($fundamento->created_at)}}
                    <br>
                    Actualizado: {{ \FormatDateTime::LongTimeFilter($fundamento->updated_at)}}
                    </p>
                    <div class="clearfix"></div>
                    <hr>
                    <p>
                        <label>Descripción <strong>{{$fundamento->desc_fundamento}}</strong></label>
                        <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.fundament.partials.error')
    @endif
</div>
@endsection