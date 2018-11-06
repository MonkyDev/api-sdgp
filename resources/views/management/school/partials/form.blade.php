<div class="form-group">
	{{ Form::label('clave', 'Clave de plantel') }}
	{{ Form::text('clave', old('clave'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('nombre', 'Nombre del plantel') }}
	{{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('tipo_sostenimiento', 'Tipo de sostenimiento al que pertenece') }}
	{{ Form::text('tipo_sostenimiento', old('tipo_sostenimiento'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('tipo_educativo', 'Tipo de educación imparten') }}
	{{ Form::text('tipo_educativo', old('tipo_educativo1'), ['class'=>'form-control']) }}
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>