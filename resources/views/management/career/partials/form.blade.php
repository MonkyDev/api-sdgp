@php
	isset($carrera->cveCarrera)? $attr=true : $attr=false ;
@endphp

<div class="form-group">
	{{ Form::label('cveCarrera', 'Clave de la carrera') }}
	{{ Form::text('cveCarrera', old('cveCarrera'), ['disabled'=>$attr, 'class'=>'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('nombreCarrera', 'Nombre de la carrera') }}
	{{ Form::text('nombreCarrera', old('nombreCarrera'), ['class'=>'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('modalidad', 'Modalidad de la carrera') }}
	{{ Form::text('modalidad', old('modalidad'), ['class'=>'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('nivel', 'Nivel de estudios') }}
	{{ Form::text('nivel', old('nivel'), ['class'=>'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('noRevoe', 'Revoe secretaría') }}
	{{ Form::text('noRevoe', old('noRevoe'), ['class'=>'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('autorizacion_id', 'Autorización escolar') }}
	<select name="autorizacion_id" id="autorizacion_id" class="form-control">
			{!! '<option value="0">Seleccionar</option>' !!}
		@foreach ($autorizaciones as $autorizacion)
			{!! '<option value="'.$autorizacion->id.'">'.$autorizacion->desc_autorizacion.'</option>' !!}
		@endforeach
	</select>
</div>

<div class="form-group">
	{{ Form::label('institucion_id', 'Institución escolar') }}
	<select name="institucion_id" id="institucion_id" class="form-control">
			{!! '<option value="0">Seleccionar</option>' !!}
		@foreach ($instituciones as $institucion)
			{!! '<option value="'.$institucion->id.'">'.$institucion->nombre.'</option>' !!}
		@endforeach
	</select>
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

