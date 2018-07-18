@extends('pages.templates.body')
@section('title', 'Excelsior - Consejos de Seguridad')
@section('css')
<link href="{{ asset('css/pages/clientes.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 85%;margin-bottom: 434px;">
    <div class="row bloquecont center">
        <span class="titulo-cat">
            Nuestros Clientes
        </span>
        <hr class="cat-line"/>
        <div class="items-cat col l12 s12 m12">
            <p class="texto-ini">
                Nuestra misión es cubrir las necesidades de nuestros clientes y brindar el mejor servicio. Estos son algunos de los clientes con los que trabajamos.
            </p>
        </div>
        <div class="servicios" style="align-items: center">
            <div class="items-servicio row" style="align-items: center;">
                <div class="bloquecard col l12 s12 m12">
                    @foreach($clientes as $cliente)
                    <div class="col l4 s12 m6">
                        <div class="card white darken-1" style="">
                            <div class="card-content white-text">
                                <a href="{{$cliente->link}}">
                                <img alt="" src="{{asset($cliente->imagen)}}" style="">
                                </img>
                            </a>
                            </div>
                            <div class="card-action">
                                <a href="{{$cliente->link}}">
                                    {{$cliente->nombre}}
                                </a>
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

@endsection
