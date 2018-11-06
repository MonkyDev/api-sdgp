@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Niveles escolares 
                		@can('level.create')
                		<a href="{{route('level.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo 
                		Nivel</a>
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
	                                <th>Tipo</th>
	                                <th colspan="3" class="text-center"><i class="fas fa-wrench"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($niveles AS $nivel)
	                                <tr>
	                                    <td> {{ $nivel->id }} </td>
	                                    <td> {{ $nivel->desc_nivel }} </td>
	                                    <td> {{ $nivel->tipo_nivel }} </td>
	                                    <td width="5px">
	                                    	@can('level.show')
	                                    	<a href="{{route('level.show', $nivel->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
	                                    		<i class="fas fa-list"></i>
	                                    	</a>
	                                    	@endcan
	                                    </td>
	                                    <td width="5px">
	                                    	@can('level.edit')
	                                    	<a href="{{route('level.edit', $nivel->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
	                                    		<i class="fas fa-edit"></i>
	                                    	</a>
	                                    	@endcan

	                                    </td>
	                                    <td width="5px">
	                                    	@can('level.destroy')
	                                    	{!! Form::open(['route'=>['level.destroy', $nivel->id], 'method'=>'DELETE']) !!}
	                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
	                                        {!! Form::close() !!}
	                                    	@endcan
	                                        
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                   </table>
	                   {{ $niveles->render() }}
                    </div>
                    @if( session('code') )
				        @include('management.level.partials.info')
				    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection