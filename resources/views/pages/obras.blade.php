@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Obras')
@section('css')
<link href="{{ asset('css/pages/obras.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
@endsection
@section('contenido')
<div class="container" style="width: 89%">
    <div class="productos">
        <h7 style="margin-left: 2%;">
                                <a ;="" href="/categorias" style="color: gray">
                                    Obras Realizadas |
                                </a>
                                <a href="" style="color: gray;text-transform: lowercase;">
                                    {!!$categoria->nombre !!}
                                </a>
                            </h7>
            <div class="row center bloquecont">
                <div class="items-cat col l12 s12 m12" style="margin-bottom: 10%;position: relative;right: 20px;">
                            @foreach($obras as $obra)
                            <div class="col l4 s12 m4">
                                <div class="div-product">
                                <a href="" data-target="modal{!! $obra->id !!}" class="modal-trigger"> 
                                  
                                        <div class="efecto hide-on-med-and-down">
                                                    <span class="central">
                                                        <i class="center material-icons">
                                                            add
                                                        </i>
                                                    </span>
                                                </div>

                                        @foreach($obra->imagenes as $imagen)
                                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="width: 356px;height: 356px;">
                                            @if($ready == 0)    
                                        @break;
                                    @endif
                                    @endforeach
                                                <div class="div-nombrex">
                                                    {!!$obra->nombre !!}
                                                </div>
            <hr align="center" style="position: relative;left: 5%;bottom: 18px;background-color: black;border: 1px solid black;">
                                            </hr>
                                        </img>
                            
                            </a>
                                </div>
                            </div>
                            <!-- Modal Structure -->
  <div id="modal{!! $obra->id !!}" class="modal" style="height: 555px!important;max-height: 950px!important; ">
    <div class="modal-content">
        <h4 style="font-family: 'Source Sans Pro', sans-serif;font-size: 26px;color: #A70000;">{!! $obra->nombre !!}<a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Source Sans Pro', sans-serif;font-size: 14px;color: #777777;font-weight: bold;">Cerrar</a></h4>
        <div class="row">
            <div class="col l12 m12 s12" style="padding-left: 0px;">   
                <div class="cont-ser">
                                        <div class="row imggrande">
                                            <div class="col s12" style="padding-left: 0px;">
                                                @foreach($obra->imagenes as $imagen)
                                                <div class="cont-img">
                                                    <img alt="" class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" style="width: 486px;height: 305px;border:1px solid #AAAAAA;top: 2%!important;">
                                                    </img>
                                                </div>
                                                @if($ready == 0)    
                                        @break;
                                    @endif
                        @endforeach
                                            </div>
                                        </div>
                                        <div class="container" style="width: 66%;">
                                            
                                        <div class="row">
                                            <div class="col s12" style="padding-left: 0px;padding-right: 0px;">
                                                @foreach($obra->imagenes as $imagen)
                                                <div class="col l3 s3 m3" style="padding-left: 0px;">
                                                    <div class="cont-img">
                                                        <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="border: 1px solid #AAAAAA;height: 110px; width: 110px;">
                                                        </img>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <span class="left">
                                            Tareas realizadas
                                        </span>
                                        <div class="left modal_tareas">
                                                        {!!$obra->descripcion !!}
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
@endsection

@section('js')
<script type="text/javascript">


  $(document).ready(function(){
    $('.modal').modal();
  });

  function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
</script>


@endsection
