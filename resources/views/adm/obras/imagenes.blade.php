@extends('adm.layouts.frame')

@section('titulo', 'Listado de imagenes de '.$obra->titulo)

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
    <div class="row">
        {!!Form::open(['route'=>['nuevaimagen', $obra->id], 'method'=>'POST', 'files' => true])!!}
        <div class="btn-small red col l6 s12">
            <input multiple="true" name="file[]" type="file">
                {!!Form::label('Agregue imagenes:')!!}
            </input>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
Agregar
                    </button>
        </div>
        {!!Form::close()!!}
    </div>
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <th>
                    Imagen
                </th>
                <th class="text-right">
                    Borrar
                </th>
            </thead>
            <tbody>
                @foreach($imagenes as $imagen)
                <tr>
                    <td>
                        <img alt="seccion" height="300" src="{{ asset($imagen->imagen) }}" width="300"/>
                    </td>
                    <td class="text-right">
                        {!!Form::open(['class'=>'en-linea', 'route'=>['imgobras.destroy', $imagen->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm('¿Realmente deseas borrar la imagen?')" type="submit">
                            <i class="material-icons red-text">
                                cancel
                            </i>
                        </button>
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection
