@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Categorias')
@section('css')
<link href="{{ asset('css/pages/categoriaobras.css') }}" rel="stylesheet"/>

@endsection
@section('contenido')
<div class="container" style="width: 70%">
    <div class="productos">
        <div style="">
            <div class="row center bloquecont">
                <span class="titulo-cat">
                    Obras Realizadas
                </span>
                <div class="items-cat col l12 s12 m12">
                    @foreach($obras as $categoria)
                    <div class="bloquecard col l6 s12 m6 center">
                        <div class="center div-categoria card z-depth-0" style="margin-left: 10%;">
                            <div class="card-image center-align">
                                <a href="{{ route('obras', $categoria->id)}}">
                                    <div class="efecto hide-on-med-and-down">
                                        <span class="central">
                                            <i class="material-icons">
                                                add
                                            </i>
                                        </span>
                                    </div>
                                    <img src="{{asset($categoria->imagen)}}" style="">
                                    </img>
                                </a>
                            </div>
                             <hr align="center" style="position: relative;top: 41px;height: 1px;width: 100%;background-color: black;border: 1px;" />
                            <div class="div-nombre center">
                                {!!$categoria->nombre !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
</script>
@endsection
