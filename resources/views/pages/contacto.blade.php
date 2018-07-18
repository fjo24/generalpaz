@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Contacto')
@section('css')

<link rel="stylesheet" href="{{ asset('css/pages/contacto.css') }}">

@endsection
@section('contenido')
<!-- body -->        
   
	<main>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.4600901307763!2d-58.52230936847759!3d-34.59252556068421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb7b0f6bd2d31%3A0x23b2c8cf1e1962cc!2sF%C3%A1brica+de+Aberturas+General+Paz!5e0!3m2!1ses-419!2sar!4v1531887274484" width="100%" height="402" frameborder="0" style="border:0" allowfullscreen></iframe>
			
		<section class="contacto">
			<div class="container">
				<h1 class="naranja mayus fs36" style="color: #A70000; font-size: 47px; font-family: 'Source Sans Pro', sans-serif;">Contacto</h1>
				<div class=""><b>Consulta:</b> {{$producto}}</div>
				<div style="margin-top: 20px; margin-bottom: 20px; color: #6F6F6F;background-color: #fafafa;">Contáctenos y le proporcionaremos la información que necesite</div>

				<div class="row">
					<div class="col s12 l12">
						{!!Form::open(['route'=>'enviarmail', 'method'=>'POST'])!!}
						{{ csrf_field() }}
					      	<div class="row">
					      	{!!Form::hidden('producto',$producto,['class'=>''])!!}
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
					          		{!!Form::email('email',null,['class'=>'', 'placeholder'=>'Correo electronico'])!!}
					          		<label for="email"></label>
					        	</div>
					        	<div class="input-field col m6 s12" style="color: black">
					          		{!!Form::text('empresa',null,['class'=>'', 'placeholder'=>'Empresa'])!!}
					          		<label for="empresa"></label>
					        	</div>
					      	</div>
					      	<div class="row no-margin">
					        	<div class="input-field col m6 s12" style="color: black">
			          				<label for="mensaje"></label>
			          				{!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje'])!!}
					        	</div>
							    <div class="col s6">
					        
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





