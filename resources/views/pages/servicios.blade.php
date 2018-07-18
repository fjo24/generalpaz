@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Home')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/servicios.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/mantenimiento.css') }}" rel="stylesheet"/>

@endsection
@section('contenido')
<div class="slider hide-on-med-and-down">
    <ul class="slides ">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}"/>
            @if(isset($slider->texto)||isset($slider->texto2))
            <div class="caption box-cap" style="">
                <div style="">
                    <span class="slidertext1">
                        {!! $slider->texto !!}
                    </span>
                    <span class="slidertext2">
                        {!! $slider->texto2 !!}
                    </span>
                </div>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 89%;">
    <div class="servicios center" style="align-items: center">
        <div class="container" style="width: 63%;">
            <div class="titulo_servicio">
                Nuestros Servicios
            </div>
            <div class="contenido_servicio center">
                Contamos con un equipo de herreros profesionales capacitados y preparados para brindar un servicio integral completo. Cada uno de los proyectos se desarrolla teniendo en cuenta las necesidades propias y requerimientos de nuestros clientes. 
            </div>
        </div>
            <div class="items-servicio row" style="align-items: center;margin-top: 6%;">
                <div class="col l12 s12 m12">
                    @foreach($servicios as $servicio)
                    <div class="col l3 s12 m6">
                        <span class="img-servicio" style="">
                            <img alt="" src="{{asset($servicio->imagen)}}" style="">
                            </img>
                            <div class="nombre_servicio">
                                <p>
                                    {!! $servicio->nombre !!}
                                </p>
                            </div>
                            <div class="texto_servicio">
                                <p>
                                    {!! $servicio->descripcion !!}
                                </p>
                            </div>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
<div class="formulario_servicios">
    <div class="container" style="width: 45%;">
        <div class="row" style="">
            <div class="contenido-mtto col l12">
                <div class="titulo-mtto col l12 center">
                <h1 class="naranja mayus fs36" style="color: #7F7F7F; font-size: 26px; font-family: 'Source Sans Pro', sans-serif;">¿Necesitás Asesoramiento? </h1>
                <div style="margin-top: 20px; margin-bottom: 20px; color: #6F6F6F;background-color: #fafafa;">Contáctenos y le proporcionaremos la información que necesite</div>

                <div class="row">
                    <div class="col s12 l12">
                        {!!Form::open(['route'=>'enviarmail', 'method'=>'POST'])!!}
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::text('nombre',null,['class'=>'', 'placeholder'=>'Nombre'])!!}
                                    <label for="nombre"></label>
                                </div>
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::text('apellido',null,['class'=>'', 'placeholder'=>'Apellido'])!!}
                                    <label for="apellido"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::email('email',null,['class'=>'', 'placeholder'=>'Correo electronico'])!!}
                                    <label for="email"></label>
                                </div>
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    {!!Form::text('empresa',null,['class'=>'', 'placeholder'=>'Empresa'])!!}
                                    <label for="empresa"></label>
                                </div>
                            </div>
                            <div class="row no-margin">
                                <div class="input-field col l12 m12 s12" style="color: black">
                                    <label for="mensaje"></label>
                                    {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje'])!!}
                                </div>
                                <div class="col s6 center">
                            
                                <br>
                                    <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: white;height: 39px;width: 183px;color: #A70000;    border: 1px solid;font-family: 'Source Sans Pro', sans-serif;position: relative;left: 51%;">Enviar
                                    </button>
                                </div>
                            </div>
                {!!Form::close()!!}
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 450,
    });
</script>
@endsection
