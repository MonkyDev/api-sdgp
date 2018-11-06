<div class="table-responsive">
	<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Estatus</th>
                <th colspan="2" class="text-center"><i class="fas fa-wrench"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos AS $cargo)
                <tr>
                    <td> {{ $cargo->id }} </td>
                    <td> {{ $cargo->desc_cargo }} </td>
                    <td> {{ $cargo->edo==1 ? 'Activo' : 'Inactivo' }} </td>
                    {{-- <td width="5px">
                    	@can('charge.show')
                    	<a href="{{route('charge.show', $cargo->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
                    		<i class="fas fa-list"></i>
                    	</a>
                    	@endcan
                    </td> --}}
                    <td width="5px">
                    	@can('charge.edit')
                    	<a href="{{route('charge.edit', $cargo->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
                    		<i class="fas fa-edit"></i>
                    	</a>
                    	@endcan

                    </td>
                    <td width="5px">
                    	@can('charge.destroy')
                    	{!! Form::open(['route'=>['charge.destroy', $cargo->id], 'method'=>'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}
                    	@endcan
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table>
   {{ $cargos->render() }}
</div>
@if( session('code') )
    @include('staff.charge.partials.info')
@endif
