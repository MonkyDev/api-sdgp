@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Carreras del instituto activas
                		@can('career.create')
                		<a href="{{route('career.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nueva carrera</a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    	<table class="table table-striped table-hover">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Clave</th>
	                                <th>Nombre</th>
	                                <th>Nivel</th>
	                                <th>Modalidad</th>
	                                <th>Revoe</th>
	                                <th colspan="3" class="text-center"><i class="fas fa-wrench"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($carreras AS $carrera)
	                                <tr>
	                                    <td> {{ $carrera->id }} </td>
	                                    <td> {{ $carrera->cveCarrera }} </td>
	                                    <td> {{ $carrera->nombreCarrera }} </td>
	                                    <td> {{ $carrera->nivel }} </td>
	                                    <td> {{ $carrera->modalidad }} </td>
	                                    <td> {{ $carrera->noRevoe }} </td>
	                                    <td width="5px">
	                                    	@can('career.show')
	                                    	<a href="{{route('career.show', $carrera->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
	                                    		<i class="fas fa-list"></i>
	                                    	</a>
	                                    	@endcan
	                                    </td>
	                                    <td width="5px">
	                                    	@can('career.edit')
	                                    	<a href="{{route('career.edit', $carrera->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
	                                    		<i class="fas fa-edit"></i>
	                                    	</a>
	                                    	@endcan

	                                    </td>
	                                    <td width="5px">
	                                    	@can('career.destroy')
	                                    	{!! Form::open(['route'=>['career.destroy', $carrera->id], 'method'=>'DELETE']) !!}
	                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
	                                        {!! Form::close() !!}
	                                    	@endcan
	                                        
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                   </table>
	                   {{ $carreras->render() }}
                    </div>
                    @if( session('code') )
				        @include('management.career.partials.info')
				    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection