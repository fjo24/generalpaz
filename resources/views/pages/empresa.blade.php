@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Empresa')
@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/slider.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/empresa.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/certificaciones.css') }}">
@endsection
@section('contenido')
   <div class="slider hide-on-med-and-down" >
      <ul class="slides">
      @foreach($sliders as $slider)
         <li>
            <img src="{{asset($slider->imagen)}}" style="width: 120%; height: 110%">
            <div class="caption empresa_slider_dif" style="text-align: left; position: absolute;top: 18%;left: 9%;font-size:50px; background-color: rgba(163, 0, 0, 0.9); width: 503px; height: 215px; line-height: 100%; font-family: 'Source Sans Pro', sans-serif;padding-left: 2%;    bottom: 5px;">
               <div style="padding-top: 25px">  
                  <span style="text-align: left;font-weight: lighter;font-size: 30px; font-family: 'Source Sans Pro', sans-serif; font-weight: lighter;position: relative;    bottom: 4px;right: 13px;">{!! $slider->texto !!}</span><br>
                  <span style="padding: 0;font-size: 50px; font-family: 'Source Sans Pro', sans-serif; line-height: 10px;">{!! $slider->texto2 !!}</span>
                  <hr style="position: absolute; left: 20px; bottom: 25px ;width: 80%">
               </div>
            </div>
          </li>
      @endforeach
      </ul>
   </div>
<div class="container" style="width: 88%;">
  <div class="empresa">  
    <div class="row" style="    margin-top: 1.5%;">
      <div class="col l5 s12 hide-on-med-and-down" style="margin-top: 3.5%;">
        <img class="responsive-img" style="width: 470px; height: 527px" src="{!! $contenido->imagen !!}">
      </div>
      <br>
      <div class="col l7 s9" style="margin-top: 0.5%;">
          <hr>
          <div class="descripcion_empresa">{!! $contenido->descripcion !!}</p></div>
          <hr>
          <div class="contenido_empresa">{!! $contenido->contenido !!}</p></div>
      </div>
  </div>
</div>
</div>
<div class="certificaciones">
<div class="container" style="width: 100%;">
  <div class="certi" style="    margin-top: 5%;">  
    <div class="row" style="">
      <div class="col l6 m6 s12" >
<div class="container" style="width: 65%;">
        <div class="titulo left">Certificaciones</div>
        <br>
          <hr class="left">
          <br>
          <div class="descripcion left" style="">{!! $certificacion->contenido !!}</div>
      </div>
      </div>
      <br>
      <div class="col l6 m6 s12" style="width: 428px;height: 303px;position: relative;bottom: 78px;left: 58px;margin-bottom: 2%;">
          <div class="slider" >
      <ul class="slides">
      @foreach($imagenes as $slider)
         <li>
            <img src="{{asset($slider->imagen)}}" style="">
          </li>
      @endforeach
      </ul>
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
        height: 334
    });

    $('.slider').slider({
        indicators: true,
        height: 303
    });
  
</script>
@endsection