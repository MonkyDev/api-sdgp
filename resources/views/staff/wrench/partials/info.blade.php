<div class="col-md-12">
    <div class="alert alert-{{(session('code')==200)? 'info' : 'warning'}} alert-dismissible fade show" role="alert">
      <strong>Respuesta del servidor...</strong>
      	@if ( session('code') == 200 )
			En horabuena, El registro se ha <i class="text-success"><b>Creado</b></i> exitosamente.
        @elseif( session('code') == 201 )
            En horabuena, El registro se ha <i class="text-danger"><b>Eliminado</b></i> exitosamente.
        @elseif( session('code') == 202 )
            En horabuena, El registro se ha  <i class="text-success"><b>Actualizado</b></i> exitosamente.
      	@elseif( session('code') == 302 )
			<i class="text-danger"><b>Error</b></i> al intentar guardar la información.
      	@elseif( session('code') == 303 )
      		<i class="text-danger"><b>Error</b></i> al intentar guardar el historial.
        @elseif( session('code') == 304 )
            <i class="text-danger"><b>Error</b></i> al intentar guardar los archivos.
      	@endif 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</div>