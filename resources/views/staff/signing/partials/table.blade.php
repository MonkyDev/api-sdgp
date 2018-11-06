<div class="table-responsive">
	<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Nombre</th>
                <th>Curp</th>
                <th colspan="2" class="text-center"><i class="fas fa-wrench"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($firmas AS $firma)
                <tr>
                    <td> {{ $firma->id }} </td>
                    <td> {{ $firma->abrTitulo }} </td>
                    <td> {{ $firma->nombre.' '.$firma->primerApellido.' '.$firma->segundoApellido }} </td>
                    <td> {{ $firma->curp }} </td>
                    {{-- <td width="5px">
                    	@can('signing.show')
                    	<a href="{{route('signing.show', $firma->id)}}" class="btn btn-outline-info btn-sm" title="Ver">
                    		<i class="fas fa-list"></i>
                    	</a>
                    	@endcan
                    </td> --}}
                    <td width="5px">
                    	@can('signing.edit')
                    	<a href="{{route('signing.edit', $firma->id)}}" class="btn btn-outline-warning btn-sm" title="Editar">
                    		<i class="fas fa-edit"></i>
                    	</a>
                    	@endcan

                    </td>
                    <td width="5px">
                    	@can('signing.destroy')
                    	{!! Form::open(['route'=>['signing.destroy', $firma->id], 'method'=>'DELETE']) !!}
                        <button class="btn btn-outline-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}
                    	@endcan
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table>
   {{ $firmas->render() }}
</div>
@if( session('code') )
    @include('staff.signing.partials.info')
@endif
