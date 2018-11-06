@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Bienvenido!</h3></div>

                <div class="card-body text-success">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Sistema para el Registro de los Títulos Electrónicos Profesionales, que se generan en el Instituto de Estudios Superiores de Chiapas.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
