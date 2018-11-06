<div class="form-group">
	{{ Form::label('desc_fundamento', 'Descripcion fundamento') }}
	{{ Form::text('desc_fundamento', old('desc_fundamento'), ['class'=>'form-control']) }}
</div>

<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>