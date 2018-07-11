@extends('adm.layouts.frame')

@section('titulo', 'Listado de Clientes')

@section('contenido')
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
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
						<td>Imagen</td>
						<td>Nombre</td>
						<td>Link</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($clientes as $cliente)
						<tr>
							<td><img src="{{ asset($cliente->imagen) }}" alt="seccion" width="117" height="117"/></td>
							<td>{{ $cliente->nombre }}</td>
							<td>{{ $cliente->link }}</td>
							<td class="text-right">
								<a href="{{ route('clientes.edit', $cliente->id) }}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['clientes.destroy', $cliente->id], 'method' => 'DELETE'])!!}
									<button onclick="return confirm('¿Realmente deseas borrar el cliente?')" type="submit" class="submit-button">
										<i class="material-icons red-text">cancel</i>
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