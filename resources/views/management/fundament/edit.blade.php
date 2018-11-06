@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro del fundamento del servicio social</h5>
                </div>

                <div class="card-body">
                    {!! Form::model($fundamento, ['route' => ['fundament.update', $fundamento->id], 'method' => 'PUT' ]) !!}
                        
                        @include('management.fundament.partials.form')

                    {!! Form::close() !!}
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