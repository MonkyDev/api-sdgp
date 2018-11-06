@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Modificar Registro</h5>
                </div>

                <div class="card-body">
                    {!! Form::model($firma, ['route' => ['signing.update', $firma->id], 'method' => 'PUT' ]) !!}
                        
                        @include('staff.signing.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('staff.signing.partials.error')
    @endif
</div>
@endsection