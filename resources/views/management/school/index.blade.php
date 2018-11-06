@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Planteles escolares 
                		@can('school.create')
                		<a href="{{route('school.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo 
                		plantel</a>
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
	                                <th>Sostenimiento</th>
	                                <th>Educativo</th>
	                                <th colspan="3" class="text-center"><i class="fas fa-wrench"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($instituciones AS $institucion)
	                                <tr>
	                                    <td> {{ $institucion->id }} </td>
	                                    <td> {{ $institucion->clave }} </td>
	                                    <td> {{ $institucion->nombre }} </td>
	                                    <td> {{ $institucion->tipo_sostenimiento }} </td>
	                                    <td> {{ $institucion->tipo_educativo }} </td>
	                                    <td width="5px">
	                                    	@can('school.show')
	                                    	<a href="{{route('school.show', $institucion->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
	                                    		<i class="fas fa-list"></i>
	                                    	</a>
	                                    	@endcan
	                                    </td>
	                                    <td width="5px">
	                                    	@can('school.edit')
	                                    	<a href="{{route('school.edit', $institucion->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
	                                    		<i class="fas fa-edit"></i>
	                                    	</a>
	                                    	@endcan

	                                    </td>
	                                    <td width="5px">
	                                    	@can('school.destroy')
	                                    	{!! Form::open(['route'=>['school.destroy', $institucion->id], 'method'=>'DELETE']) !!}
	                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
	                                        {!! Form::close() !!}
	                                    	@endcan
	                                        
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                   </table>
	                   {{ $instituciones->render() }}
                    </div>
                    @if( session('code') )
				        @include('management.school.partials.info')
				    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection