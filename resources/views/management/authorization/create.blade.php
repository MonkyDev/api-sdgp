@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Registro Autorización de estudios</h5>
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'authorization.store']) !!}
                        
                        @include('management.authorization.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('management.authorization.partials.error')
    @endif
</div>
@endsection