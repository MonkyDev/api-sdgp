<div class="form-group">
	{{ Form::label('desc_autorizacion', 'Descripcion autorización') }}
	{{ Form::text('desc_autorizacion', old('desc_autorizacion'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('edo', 'Estatus') }}
	{{
		Form::select('edo', 
			['0' => 'Seleccionar', '1' => 'Activo', '2' => 'Sin uso'], 
			null, 
			['class'=>'form-control']
		)
	}}
</div>

<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>