@extends('adm.layouts.frame')

@section('titulo', 'Registrar Obra')

@section('contenido')
        @if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
		@if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col s12">
        {!!Form::open(['route'=>'obras.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
						{!!Form::text('orden', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('categoria_obra_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Categoria']) !!}
            </div>
            <div class="btn-small red col l6 s12">
				<input type="file" name="file[]" multiple="true">
				{!!Form::label('Agregue imagenes:')!!}
			</div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="tareas">
                    Tareas realizadas
                </label>
            </div>
            <div class="input-field col s12">
                <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
                </textarea>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
Crear
</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('descripcion');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
	
$(document).ready(function(){
    $('select').formSelect();
  });

</script>
@endsection

