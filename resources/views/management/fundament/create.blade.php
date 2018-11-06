@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro de Fundamento Legal</h5>
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'fundament.store']) !!}
                        
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