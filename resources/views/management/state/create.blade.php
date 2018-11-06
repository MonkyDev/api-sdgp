@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro de la Carrera profesional<h5>
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'career.store']) !!}
                        
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
@endsection