@extends('adm.layouts.frame')

@section('titulo', 'Ventajas')

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
        <table class="highlight bordered">
            <thead>
                <td>
                    Imagen
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    Orden
                </td>
                <td class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                @foreach($ventajas as $ventaja)
                <tr>    
                    <td>
                        <img alt="" class="imagen_listado" height="60%" src="{{ asset($ventaja->imagen) }}" width="72%"/>
                    </td>
                    <td>
                        {!!$ventaja->nombre!!}
                    </td>
                    <td>
                        {!!$ventaja->orden!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('ventajas.edit', $ventaja->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['ventajas.destroy', $ventaja->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm('¿Realmente deseas borrar la ventaja?')" type="submit">
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
