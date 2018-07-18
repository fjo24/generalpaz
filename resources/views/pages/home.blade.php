@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Home')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/lineashome.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="slider hide-on-med-and-down">
    <ul class="slides ">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}" style="width: 120%; height: 110%">
                <div class="caption" style="text-align: left; position: absolute;top: 30%;left: 9%;font-size:50px; background-color: rgba(163, 0, 0, 0.9); width: 734px; height: 250px; line-height: 100%; font-family: 'Source Sans Pro', sans-serif;padding-left: 2%;">
                    <div style="padding-top: 25px">
                        <span style="text-align: left;font-weight: lighter;font-size: 30px; font-family: 'Source Sans Pro', sans-serif; font-weight: lighter;">
                            {!! $slider->texto !!}
                        </span>
                        <br>
                            <span style="font-size: 50px; font-family: 'Source Sans Pro', sans-serif; font-weight: bold;">
                                {!! $slider->texto2 !!}
                            </span>
                            <hr style="position: absolute; left: 20px; bottom: 25px ;width: 80%">
                            </hr>
                        </br>
                    </div>
                </div>
            </img>
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 84%;">
    <div class="destacados">
        <div style="margin-top: -2%;margin-bottom: 0%;">
            <div class="row">
                <div class="col s12">
                    @foreach($destacados as $destacado)
                    <div class="col s12 m6" style="margin-top: 4%;">
                        <div class="div-product">
                            <a href="{{$destacado->link}}">
                                <img alt="" class="responsive-img" src="{{asset($destacado->imagen)}}" style="width: 550px;height: 413px">
                                    <div class="div-nombre" style="display: flex;">
                                        <span style="color: white;display: table-cell;text-align: center;justify-content: center;">
                                            {!!$destacado->nombre !!}
                                        </span>
                                    </div>
                                </img>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="lineasdecontenido">
    <div class="container" style="width: 84%;">
            <div class="home col s12">
                <div class="row titulo center">
                    {!! $home->nombre !!}
                </div>
                        <div class="row descripcion center">
                            {!! $home->descripcion !!}
                        </div>
                <hr/>
                    <br>
                    <br>
                        <div class="row contenido center">
                            {!! $home->contenido !!}
                        </div>
                    </br>
            </div>
        </div>
        </div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 549,
    });
</script>
@endsection
