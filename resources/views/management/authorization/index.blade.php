@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Autorizaciones o reconocimiento de estudios 
                		@can('authorization.create')
                		<a href="{{route('authorization.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nueva 
                		autorización</a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    	<table class="table table-striped table-hover">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Descripción</th>
	                                <th>Estatus</th>
	                                <th colspan="3" class="text-center"><i class="fas fa-wrench"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($autorizaciones AS $autorizacion)
	                                <tr>
	                                    <td> {{ $autorizacion->id }} </td>
	                                    <td> {{ $autorizacion->desc_autorizacion }} </td>
	                                    <td> {{ ($autorizacion->edo == 1)? 'Activo' : 'Sin uso' }} </td>
	                                    <td width="5px">
	                                    	@can('authorization.show')
	                                    	<a href="{{route('authorization.show', $autorizacion->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
	                                    		<i class="fas fa-list"></i>
	                                    	</a>
	                                    	@endcan
	                                    </td>
	                                    <td width="5px">
	                                    	@can('authorization.edit')
	                                    	<a href="{{route('authorization.edit', $autorizacion->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
	                                    		<i class="fas fa-edit"></i>
	                                    	</a>
	                                    	@endcan

	                                    </td>
	                                    <td width="5px">
	                                    	@can('authorization.destroy')
	                                    	{!! Form::open(['route'=>['authorization.destroy', $autorizacion->id], 'method'=>'DELETE']) !!}
	                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
	                                        {!! Form::close() !!}
	                                    	@endcan
	                                        
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                   </table>
	                   {{ $autorizaciones->render() }}
                    </div>
                    @if( session('code') )
				        @include('management.authorization.partials.info')
				    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection