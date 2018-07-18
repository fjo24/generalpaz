@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
        @endsection
@section('contenido')
        <div class="container" style="width: 90%;">
            <div class="categorias">
                <div style="">
                    <div class="row">
                        <div class="col l3 s12 m3">
                            <h7>
                                <a ;="" href="/categorias" style="color: gray">
                                    Productos |
                                </a>
                                <a href="" style="color: gray;text-transform: capitalize;">
                                    {!!$categoria->nombre !!} |
                                </a>
                                <a href="" style="color: gray;text-transform: capitalize;">
                                    {!!$p->nombre !!}
                                </a>
                            </h7>
                            @include('pages.templates.nav_categorias')
                        </div>
                        {{-- Menu final --}}
                        <div class="galeria2 col l9 m9 s12">
                            <div class="col l12 m12 s12" style="padding: 0;    height: auto;    padding-left: 2%!important;">
                                <div class="col l6 m12 s12 galeriadeproducto">
                                    <div class="cont-ser">
                                        <div class="row imggrande">
                                            <div class="col s12" style="padding-left: 0px;">
                                                @foreach($p->imagenes as $imagen)
                                                <div class="cont-img">
                                                    <img alt="" class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                                                    </img>
                                                </div>
                                                @if($ready == 0)    
                                        @break;
                                    @endif
                        @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12" style="padding-left: 0px;padding-right: 0px;">
                                                @foreach($p->imagenes as $imagen)
                                                <div class="col l4 s4 m2" style="padding-left: 0px;">
                                                    <div class="cont-img">
                                                        <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="border: 1px solid #AAAAAA;height: 110px; width: 110px;">
                                                        </img>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l6 m12 s12 infoproducto" style="padding-left: 29px;">
    <div class="nombreproducto">
        {!! $p->nombre !!}
    </div>
    <hr class="n-line left"/>
    <br><br>
    <div class="left detalles">
        Detalles
    </div>
    <br>
    <div class="descripcionproducto">
        {!! $p->descripcion !!}
    </div>
    <a href="{{ url('/contacto', $p->nombre) }}">
        <button class="pedido btn btn-default left" href="" style="background-color: #7D0045;">
            <span class="rpedido">
                REALIZAR CONSULTA
            </span>
        </button>
    </a>
</div>
                            </div>

                            <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active" href="#modelos">Modelos</a></li>
        <li class="tab col s4"><a class="" href="#vidrios">Tipologías de Vidrio</a></li>
        <li class="tab col s4"><a href="#ventajas">Ventajas</a></li>
      </ul>
    </div>
    <div id="modelos" class="modelo_body col s12">
        <div class="col l12 m12 s12" >
                @foreach($p->modelos as $modelo)
            <div class="col l2 m2 s12 center" >
                <a href="" data-target="modal{!! $modelo->id !!}" class="modal-trigger" style=""> 
                    <img style="" src="{{asset($modelo->imagen)}}" alt="">
                    <span class="modelo_nombre">{{$modelo->nombre}}</span>
                </a>
                <!-- Modal Structure -->
                  <div id="modal{!! $modelo->id !!}" class="modal">
                    <div class="modal-content">
                        <h4>{!! $modelo->nombre !!}<a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #B3004A;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <div class="col l12 m12 s12" style="padding-left: 0px;">   
                                <div class="col l3 m3 s3" style="padding-left: 0px;">    
                                    <img class="responsive-img modal_img" src="{{ asset($modelo->imagen) }}"/>
                                </div> 
                                <div class="col l9 m9 s9">   
                                    <div class="modal_descripcion left">
                                        {!! $modelo->descripcion !!}
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
                @endforeach   
        </div>
    </div>
    <div id="vidrios" class="col s12">
    <div class="col l12 m12 s12" >
                @foreach($p->tiposvidrio as $vidrio)
            <div class="col l2 m2 s12 center" >
                <a href="" data-target="modalv{!! $vidrio->id !!}" class="modal-trigger" style=""> 
                    <img style="" src="{{asset($vidrio->imagen)}}" alt="">
                    <span class="modelo_nombre">{{$vidrio->nombre}}</span>
                </a>
                <!-- Modal Structure -->
                  <div id="modalv{!! $vidrio->id !!}" class="modal">
                    <div class="modal-content">
                        <h4>{!! $vidrio->nombre !!}<a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #B3004A;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <div class="col l12 m12 s12" style="padding-left: 0px;">   
                                <div class="col l3 m3 s3" style="padding-left: 0px;">    
                                    <img class="responsive-img modal_img" src="{{ asset($vidrio->imagen) }}"/>
                                </div> 
                                <div class="col l9 m9 s9">   
                                    <div class="modal_descripcion left">
                                        {!! $vidrio->descripcion !!}
                                    </div> 
                                    <div class="modal_descripcion left">
                                        {!! $vidrio->contenido !!}
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
                @endforeach   
        </div>
        </div>
    <div id="ventajas" class="col s12">
        <div class="col l12 m12 s12" >
                @foreach($p->ventajas as $ventaja)
            <div class="col l2 m2 s12 center" >
                <a href="" data-target="modalve{!! $ventaja->id !!}" class="modal-trigger" style=""> 
                    <img style="" src="{{asset($ventaja->imagen)}}" alt="">
                    <span class="modelo_nombre">{{$ventaja->nombre}}</span>
                </a>
                <!-- Modal Structure -->
                  <div id="modalve{!! $ventaja->id !!}" class="modal">
                    <div class="modal-content">
                        <h4>{!! $ventaja->nombre !!}<a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #B3004A;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <div class="col l12 m12 s12" style="padding-left: 0px;">   
                                <div class="col l3 m3 s3" style="padding-left: 0px;">    
                                    <img class="responsive-img modal_img" src="{{ asset($ventaja->imagen) }}"/>
                                </div> 
                                <div class="col l9 m9 s9">   
                                    <div class="modal_descripcion left">
                                        {!! $ventaja->descripcion !!}
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
                @endforeach   
        </div>
    </div>
  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </link>
</link>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });

    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }

    $(document).ready(function(){
    $('.tabs').tabs();
  });

    $(document).ready(function(){
    $('.modal').modal();
  });
          
</script>
@endsection
