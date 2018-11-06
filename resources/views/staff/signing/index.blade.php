@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Cargos de los Firmantes 
                		@can('signing.create')
                		<a href="{{route('signing.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo Registro</a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                   @include('staff.signing.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection