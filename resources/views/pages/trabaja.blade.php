@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Trabaja con nosotros')
@section('css')

<link rel="stylesheet" href="{{ asset('css/pages/contacto.css') }}">

@endsection
@section('contenido')
<!-- body -->        
   
	<main>			
		<section class="contacto">
			<div class="container">
				<h1 class="center" style="color: #A70000; font-size: 47px; font-family: 'Source Sans Pro', sans-serif;">Trabaje con Nosotros</h1>
				<div style="margin-top: 20px; margin-bottom: 20px; color: #6F6F6F;background-color: #fafafa;">Complete el siguiente formulario, adjunte el CV y nos contactaremos a la brevedad</div>

				<div class="row">
					<div class="col s12 l12">
						{!!Form::open(['route'=>'enviarcv', 'method'=>'POST'])!!}
						{{ csrf_field() }}
					      	<div class="row">
					      	
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('nombre',null,['class'=>'', 'placeholder'=>'Nombre'])!!}
					          		<label for="nombre"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('apellido',null,['class'=>'', 'placeholder'=>'Apellido'])!!}
					          		<label for="apellido"></label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('telefono',null,['class'=>'', 'placeholder'=>'Telefono'])!!}
					          		<label for="telefono"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::email('email',null,['class'=>'', 'placeholder'=>'E-mail'])!!}
					          		<label for="email"></label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('documento',null,['class'=>'', 'placeholder'=>'Numero de documento'])!!}
					          		<label for="documento"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('domicilio',null,['class'=>'', 'placeholder'=>'Domicilio'])!!}
					          		<label for="domicilio"></label>
					        	</div>
					      	</div>
					      	<div class="row">
				                  <div class="file-field col l6 m6 s12 push-l1">
				                    <div class="left file-path-wrapper" style="    right: 115px;width: 60%;position: relative;left: -76px;">
				                      <input class="file-path validate" type="text" file">
				                    </div>
				                    <div class="btn" style="background-color: white;height: 39px;width: 183px;color: #A70000;    border: 1px solid;font-family: 'Source Sans Pro', sans-serif;position: relative;
    right: 55px;">
				                      <input type="file" id="imagen" name="imagen">
				                      <span>Examinar</span>
				                    </div>
				                  </div>
							    <div class="col s6">
					        asdas
					        	<br>
							      	<button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: white;height: 39px;width: 183px;color: #A70000;    border: 1px solid;font-family: 'Source Sans Pro', sans-serif;">Enviar
									</button>
								</div>
					      	</div>
					</div>
				</div>
				{!!Form::close()!!}
			</div>
	</section>


@endsection

@section('js')
	<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

	<script type="text/javascript">
        $('.logo').click(() => {
            window.location.href = "";
        });
    </script>
@endsection





