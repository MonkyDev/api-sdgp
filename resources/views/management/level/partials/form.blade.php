<div class="form-group">
	{{ Form::label('desc_nivel', 'Descripcion del nivel') }}
	{{ Form::text('desc_nivel', old('desc_nivel'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('tipo_nivel', 'Tip de nivel') }}
	{{ Form::text('tipo_nivel', old('tipo_nivel'), ['class'=>'form-control']) }}
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>