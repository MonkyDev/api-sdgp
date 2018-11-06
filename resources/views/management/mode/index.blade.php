@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Modalidades de titulación 
                		@can('school.create')
                		<a href="{{route('mode.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nueva 
                		Modalidad</a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                   @include('management.mode.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection