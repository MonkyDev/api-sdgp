<div class="form-group">
	{{ Form::label('desc_modalidad', 'Descripción de la modalidad') }}
	{{ Form::text('desc_modalidad', old('desc_modalidad'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('tipo_modalidad', 'Tipo de modalidad') }}
	{{ Form::text('tipo_modalidad', old('tipo_modalidad'), ['class'=>'form-control']) }}
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>