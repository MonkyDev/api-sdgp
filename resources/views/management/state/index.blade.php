@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> Entidades federativas registradas
                		@can('state.create')
                		<a href="{{route('state.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo estado </a>
                		@endcan
                	</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    	<table class="table table-striped table-hover">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>ID</th>
	                                <th>Nombre</th>
	                                <th>Abreviatura</th>
	                                <th colspan="3" class="text-center"><i class="fas fa-wrench"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($estados AS $state)
	                                <tr>
	                                    <td> {{ $state->id }} </td>
	                                    <td> {{ $state->ck_entidad }} </td>
	                                    <td> {{ $state->desc_entidad }} </td>
	                                    <td> {{ $state->abrv }} </td>
	                                    <td width="5px">
	                                    	@can('state.show')
	                                    	<a href="{{route('state.show', $state->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
	                                    		<i class="fas fa-list"></i>
	                                    	</a>
	                                    	@endcan
	                                    </td>
	                                    <td width="5px">
	                                    	@can('state.edit')
	                                    	<a href="{{route('state.edit', $state->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
	                                    		<i class="fas fa-edit"></i>
	                                    	</a>
	                                    	@endcan

	                                    </td>
	                                    <td width="5px">
	                                    	@can('state.destroy')
	                                    	{!! Form::open(['route'=>['state.destroy', $state->id], 'method'=>'DELETE']) !!}
	                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
	                                        {!! Form::close() !!}
	                                    	@endcan
	                                        
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                   </table>
	                   {{ $estados->render() }}
                    </div>
                    @if( session('code') )
				        @include('management.state.partials.info')
				    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection