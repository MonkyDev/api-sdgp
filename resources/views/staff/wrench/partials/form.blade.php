<div class="form-group">
	{{ Form::label('cargo_id', 'Cargos Administrativos') }}
	{!! Form::select('cargo_id', $cargos, old('cargo_id'), ['class' => 'form-control', 'required']) !!}
</div>

@if ( !isset($responsable) )

<div class="form-group">
	{{ Form::label('firma_id', 'Personal Administrativo') }}
	{!! Form::select('firma_id', $firmantes, old('firma_id'), ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{{ Form::label('numeracion', 'Numero del certificado') }}
	{!! Form::number('numeracion', old('numeracion'), ['class'=>'form-control','required']) !!}
</div>

<div class="form-group">
	{{ Form::label('certificado', 'Archivo certificado publico SAT (.cer)') }}
	{!! Form::file('certificado', old('certificado'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{{ Form::label('llave', 'Archivo Llave privada SAT (.key)') }}
	{!! Form::file('llave', old('llave'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{{ Form::label('firma', 'Firma de la Llave privada') }}
	{!! Form::password('firma', ['class'=>'form-control','required']) !!}
</div>
@endif

<div class="form-group">
	{{ Form::label('edo', 'Estatus Firma Responsable') }}
	{!!
		Form::select('edo',
			[
			'' => 'Seleccionar',
			1 => 'Activo',
			0 => 'Inactivo',
			],
			old('edo'),
			['class'=>'form-control','required']
		)
	!!}
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>