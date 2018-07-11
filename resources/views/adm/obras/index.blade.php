@extends('adm.layouts.frame')

@section('titulo', 'Listado de obras')

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
                    Nombre
                </td>
                <td>
                    Categoria
                </td>
                <td>
                    Orden
                </td>
                <td>
                    Administrar imagenes
                </td>
                <td class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                @foreach($obras as $obra)
                <tr>
                    <td>
                        {{ $obra->nombre }}
                    </td>
                    <td>
                        {{ $obra->categoria_obra->nombre }}
                    </td>
                    <td>
                        {{ $obra->orden }}
                    </td>
                    <td>
                        <a href="{{ route('imagenobra',$obra->id)}}">
                            <i class="material-icons">
                                image
                            </i>
                        </a>
                    </td>
                    <td class="text-right">
                        <a href="{{ route('obras.edit',$obra->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['obras.destroy', $obra->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm('¿Realmente deseas borrar la obra?')" type="submit">
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
@endsection
