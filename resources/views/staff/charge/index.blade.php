@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Cargos de los Firmantes 
                		@can('charge.create')
                		<a href="{{route('charge.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo Registro</a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                   @include('staff.charge.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection