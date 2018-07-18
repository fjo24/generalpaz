@extends('adm.layouts.frame')

@section('titulo', 'Editar contenido home')

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

            <div class=" col l12 m12 s12">
                {!!Form::open(['route'=>['imgcertificaciones'], 'method'=>'POST', 'files' => true])!!}
                <div class="row">
                    <div class="btn col l6 s12">
                        <input type="file" name="file[]" multiple="true">
                        {!!Form::label('Agregue imagenes:')!!}
                    </div>
                </div>
                <div class="col s12 no-padding">
                    {!!Form::submit('Agregar', ['class'=>'waves-effect waves-light btn right'])!!}
                </div>
            
            {!!Form::close()!!} 
         
            </div>
            <div class="col s12">
                <table class="highlight bordered">
                    <thead>
                        <th>Imagen</th>
                        <th class="text-right">Borrar</th>
                    </thead>
                    <tbody>
                    @foreach($imagenes as $imagen)
                        <tr>
                            <td><img src="{{ asset($imagen->imagen) }}" alt="seccion" width="300" height="300"/></td>
                            <td class="text-right">
                                   {!!Form::open(['class'=>'en-linea', 'route'=>['imgcertificaciones.destroy', $imagen->id], 'method' => 'DELETE'])!!}
                                    <button onclick="return confirm('¿Realmente deseas borrar la imagen?')" type="submit" class="submit-button">
                                        <i class="material-icons red-text">cancel</i>
                                    </button>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>                
            </div>


    <div class="col l12 m12 s12">
        {!!Form::model($certificacion, ['route'=>['certificaciones.update',$certificacion->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="col s12">
                <label class="col l12 s12" for="parrafo">
                    Descripción
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
                        {{$certificacion->contenido}}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
<script type="text/javascript">
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
</script>
@endsection
