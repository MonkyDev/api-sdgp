<div class="table-responsive">
	<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Administrativo</th>
                <th>Cargo</th>
                <th>Estatus</th>
                <th colspan="2" class="text-center"><i class="fas fa-wrench"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($responsables AS $responsable)
                <tr>
                    <td> {{ $responsable->id }} </td>
                    <td> {{ $responsable->Firma->nombre.' '.$responsable->Firma->primerApellido.' '.$responsable->Firma->segundoApellido }} </td>
                    <td> {{ $responsable->Cargo->desc_cargo }} </td>
                    <td> {{ $responsable->edo==1 ? 'Activo' : 'Inactivo' }} </td>
                    {{-- <td width="5px">
                    	@can('wrench.show')
                    	<a href="{{route('wrench.show', $responsable->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
                    		<i class="fas fa-list"></i>
                    	</a>
                    	@endcan
                    </td> --}}
                    <td width="5px">
                    	@can('wrench.edit')
                    	<a href="{{route('wrench.edit', $responsable->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
                    		<i class="fas fa-edit"></i>
                    	</a>
                    	@endcan

                    </td>
                    <td width="5px">
                    	@can('wrench.destroy')
                    	{!! Form::open(['route'=>['wrench.destroy', $responsable->id], 'method'=>'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}
                    	@endcan
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table>
   {{ $responsables->render() }}
</div>
@if( session('code') )
    @include('staff.wrench.partials.info')
@endif
