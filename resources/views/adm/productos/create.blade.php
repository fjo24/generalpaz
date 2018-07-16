@extends('adm.layouts.frame')

@section('titulo', 'Nuevo producto')

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
    <div class="col l12 s12">
        {!!Form::open(['route'=>'productos.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Categoria']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('Modelos') !!}<br />
                {!! Form::select('modelos[]', $modelos, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('Tipos de vidrio') !!}<br />
                {!! Form::select('tiposvidrio[]', $tiposvidrio, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::label('Ventajas') !!}<br />
                {!! Form::select('ventajas[]', $ventajas, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            <label class="col l12 s12" for="descripcion">
                Descripcion
            </label>
            <div class="input-field col l12 s12">
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
