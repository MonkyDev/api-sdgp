@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro del Nivel escolar</h5>
                </div>

                <div class="card-body">
                    {!! Form::model($nivel, ['route' => ['level.update', $nivel->id], 'method' => 'PUT' ]) !!}
                        
                        @include('management.level.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.level.partials.error')
    @endif
</div>
@endsection