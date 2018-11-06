<div class="form-group">
	{{ Form::label('abrTitulo', 'Abreviatura Título profesional') }}
	{{ Form::text('abrTitulo', old('abrTitulo'), ['placeholder'=>'Dr. / Lic. / Ing.', 'class'=>'form-control','required']) }}
</div>

<div class="form-group">
	{{ Form::label('nombre', 'Nombre completo') }}
	{{ Form::text('nombre', old('nombre'), ['placeholder'=>'No abreviar', 'class'=>'form-control','required']) }}
</div>

<div class="form-group">
	{{ Form::label('primerApellido', 'Apellido Paterno') }}
	{{ Form::text('primerApellido', old('primerApellido'), ['placeholder'=>'No abreviar', 'class'=>'form-control','required']) }}
</div>

<div class="form-group">
	{{ Form::label('segundoApellido', 'Apellido Materno') }}
	{{ Form::text('segundoApellido', old('segundoApellido'), ['placeholder'=>'No abreviar', 'class'=>'form-control','required']) }}
</div>

<div class="form-group">
	{{ Form::label('curp', 'CURP') }}
	{{ Form::text('curp', old('curp'), ['placeholder'=>'Favor de verificarla con la RENAPO', 'class'=>'form-control','required', isset($firma->curp)? 'disabled' : '' ]) }}
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-outline-success btn-block']) }}
</div>