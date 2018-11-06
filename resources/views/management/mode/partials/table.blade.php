<div class="table-responsive">
	<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th colspan="2" class="text-center"><i class="fas fa-wrench"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($modalidades AS $modalidad)
                <tr>
                    <td> {{ $modalidad->id }} </td>
                    <td> {{ $modalidad->desc_modalidad }} </td>
                    <td> {{ $modalidad->tipo_modalidad }} </td>
                    {{-- <td width="5px">
                    	@can('mode.show')
                    	<a href="{{route('mode.show', $modalidad->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
                    		<i class="fas fa-list"></i>
                    	</a>
                    	@endcan
                    </td> --}}
                    <td width="5px">
                    	@can('mode.edit')
                    	<a href="{{route('mode.edit', $modalidad->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
                    		<i class="fas fa-edit"></i>
                    	</a>
                    	@endcan

                    </td>
                    <td width="5px">
                    	@can('mode.destroy')
                    	{!! Form::open(['route'=>['mode.destroy', $modalidad->id], 'method'=>'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}
                    	@endcan
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table>
   {{ $modalidades->render() }}
</div>
@if( session('code') )
    @include('management.mode.partials.info')
@endif
