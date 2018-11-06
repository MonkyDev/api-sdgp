@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-secondary">
                    <h5>Nuevo Registro</h5>
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'wrench.store', 'enctype' => 'multipart/form-data']) !!}
                        
                        @include('staff.wrench.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        @include('staff.wrench.partials.error')
    @endif
</div>
@endsection