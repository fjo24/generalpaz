@extends('adm.layouts.frame')

@section('titulo', 'Tipos de vidrio')

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
        {!!Form::open(['route'=>'tiposvidrio.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l4 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="input-field col l4 s12">
                {!!Form::label('orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="file-field input-field col l4 s12">
                <div class="btn">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen',null, ['class'=>'file-path', 'placeholder' => 'Recomendado (150 x 150)']) !!}
                </div>
            </div>
            <label class="col l12 s12" for="descripcion">
                Descripcion
            </label>
            <div class="input-field col l12 s12">
                <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
                </textarea>
            </div>
            <label class="col l12 s12" for="contenido">
                Contenido
            </label>
            <div class="input-field col l12 s12">
                <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
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
@endsection
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
</script>
@endsection