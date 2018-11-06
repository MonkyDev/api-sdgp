<div class="form-group">
	{{ Form::label('desc_cargo', 'Descripción del cargo Administrativo') }}
	{{ Form::text('desc_cargo', old('desc_cargo'), ['class'=>'form-control','required']) }}
</div>
<div class="form-group">
	{{ Form::label('edo', 'Estatus Cargo') }}
	{{
		Form::select('edo',
			[
			'' => 'Seleccionar',
			1 => 'Activo',
			0 => 'Inactivo',
			],
			old('edo'),
			['class'=>'form-control','required']
		)
	}}
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>