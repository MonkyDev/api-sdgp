@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro del Plantel escolar</h5>
                </div>

                <div class="card-body">
                    {!! Form::model($institucion, ['route' => ['school.update', $institucion->id], 'method' => 'PUT' ]) !!}
                        
                        @include('management.school.partials.form')

                    {!! Form::close() !!}
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