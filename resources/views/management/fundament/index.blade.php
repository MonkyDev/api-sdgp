@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h3> 
                		Fundamentos legales relativos al servicio social 
                		@can('fundament.create')
                		<a href="{{route('fundament.create')}}" class="btn btn-outline-primary btn-sm float-right">Agregar nuevo fundamento</a>
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
	                                <th colspan="3" class="text-center"><i class="fas fa-wrench"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($fundamentos AS $fundamento)
	                                <tr>
	                                    <td> {{ $fundamento->id }} </td>
	                                    <td> {{ $fundamento->desc_fundamento }} </td>
	                                    <td width="5px">
	                                    	@can('fundament.show')
	                                    	<a href="{{route('fundament.show', $fundamento->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
	                                    		<i class="fas fa-list"></i>
	                                    	</a>
	                                    	@endcan
	                                    </td>
	                                    <td width="5px">
	                                    	@can('fundament.edit')
	                                    	<a href="{{route('fundament.edit', $fundamento->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
	                                    		<i class="fas fa-edit"></i>
	                                    	</a>
	                                    	@endcan

	                                    </td>
	                                    <td width="5px">
	                                    	@can('fundament.destroy')
	                                    	{!! Form::open(['route'=>['fundament.destroy', $fundamento->id], 'method'=>'DELETE']) !!}
	                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
	                                        {!! Form::close() !!}
	                                    	@endcan
	                                        
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                   </table>
	                   {{ $fundamentos->render() }}
                    </div>
                    @if( session('code') )
				        @include('management.fundament.partials.info')
				    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection