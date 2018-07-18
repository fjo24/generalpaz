@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Obra')
@section('css')
<link href="{{ asset('css/pages/galeria.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container-fluid">
    <div class="row" style="margin: 5% 19%;">

        <!-- Modal Structure -->
        <div class="cont-ser">
            <div class="">
                <div class="titulo-galeria center">
                        {!! $obra->titulo !!}
                </div>
                <div class="subtitulo-galeria center">
                        {!! $obra->subtitulo !!}
                </div>
                <br>
                <div class="row">
                    <div class="col s12" style="padding-left: 0px;">
                        @foreach($obra->imagenes as $imagen)
                        <div class="cont-img">
                            <img "="" alt="" class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                            </img>
                        </div>
                        @if($ready == 0)    
                                        @break;
                                    @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col s12" style="padding-left: 0px;">
                        @foreach($obra->imagenes as $imagen)
                        <div class="col l4 s4 m2" style="padding-left: 0px;">
                            <div class="cont-img">
                                <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="blocktareas">
                    <div class="tareas-galeria">
                        TAREAS REALIZADAS
                </div>    
                <div class="tareas">
                    {!! $obra->tareas !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
</script>
<script>
    $(document).ready(function(){
    $('.modal').modal();
  });
</script>
@endsection
