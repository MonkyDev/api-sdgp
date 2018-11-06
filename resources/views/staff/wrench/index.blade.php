@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                        {{-- <a href="{{ route('wrench.index') }}"><li class="fa fa-arrow-circle-left"></li></a> --}}
                		Firmas administrativas registradas
                		@can('wrench.create')
                		<a href="{{route('wrench.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo Registro</a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                   @include('staff.wrench.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection