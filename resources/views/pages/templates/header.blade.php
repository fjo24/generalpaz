<header>
<nav class="header-nav">

  <div class="container nav-flex">
    <div class="container">
      
          <a href="{{ url('/') }}" class="logo-header"><img class="logo-imagen" src="{{asset('img/logo_principal.png')}}" alt=""></a>
          <a class="sidenav-trigger" data-target="mobile-demo" href="#" style="width: 0%;margin-left: -22px;
    margin-top: -39px;">
                <i class="material-icons center">
                    menu
                </i>
            </a>
          <div class="right hide-on-med-and-down">
            <div class="redes-header" style="word-spacing: 10px;">
              <img src="{{asset('img/redes/whatsapp.jpg')}}"><a href="{{ url('servicios') }}" style="color: #595959;font-size: 16px;font-family: 'Source Sans Pro', sans-serif;word-spacing: 3px;"> Whats App · {{ $telefono2->descripcion}}    </a>
                  <a style="color: black;"> |</a>
                  @if($activo=='contacto')
                  <a class="activo" href="{{ url('/contacto', 'General') }}" style="color: black;"> CONTACTO     </a>
                  @else
                  <a href="{{ url('/contacto', 'General') }}" style="color: black;"> CONTACTO     </a>
                  @endif
                  <a style="color: black;"> |</a>
                  @if($activo=='trabaja')
                  <a class="activo" href="{{ url('trabaja') }}" style="color: black;"> TRABAJA CON NOSOTROS      </a>
                  @else
                  <a href="{{ url('trabaja') }}" style="color: black;"> TRABAJA CON NOSOTROS      </a>
                  @endif
                  <a href="" data-target="modalbuscador" class="iconos-redes modal-trigger" style="">
                  <img src="{{asset('img/redes/buscador.jpg')}}"/></a>
                  <!-- Modal Structure -->
                  <div id="modalbuscador" class="modal">
                    <div class="modal-content">
                        <h4><a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #A70000;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <h4 style="font-family: 'Source Sans Pro', sans-serif; color: #A70000">Buscar por nombre de producto</h4>
                            <div class="col l12 m12 s12" style="">   
                                {!!  Form::open(['route' => 'buscar', 'method' => 'POST','class' => 'left']) !!}
                                <div class="lupa">
                                    <input id="mobile_search" name="nombre" placeholder="" type="search">
                                    </input>
                                    <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: white!important;height: 39px;width: 153px;color: #A70000;    border: 1px solid;font-family: 'Source Sans Pro', sans-serif;">Buscar
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                  </div>
              <a href="{{ $facebook->link}}" class="iconos-redes"><img src="{{asset('img/redes/facebook.jpg')}}"></a>
              <a href="{{ $instagram->link}}" class="iconos-redes"><img src="{{asset('img/redes/instagram.jpg')}}"></a>
              
            </div>  


        <div class="banda">
            <div class="linksheader" style="width: 1145px; color: black;position: relative;right: 11%;">
              @if($activo=='empresa')
                  <a class="activo" href="{{ url('empresa') }}" > 
                    EMPRESA     
                  </a>
              @else
                <a href="{{ url('empresa') }}" > 
                    EMPRESA     
                  </a>
              @endif
                  <a> |</a>
              @if($activo=='productos')
                  <a class="activo" href="{{ url('categorias') }}" >
                   PRODUCTOS      
                 </a>
              @else
                <a href="{{ url('categorias') }}" >
                   PRODUCTOS      
                 </a>
              @endif
                  <a> |</a>
              @if($activo=='servicios')
                  <a class="activo" href="{{ url('servicios') }}" > SERVICIOS     </a>
              @else
              <a href="{{ url('servicios') }}" > SERVICIOS     </a>
              @endif
                  <a> |</a>
              @if($activo=='obras')
                  <a class="activo" href="{{ url('/categoriaobras') }}" > OBRA     </a>
              @else
                  <a href="{{ url('/categoriaobras') }}" > OBRA     </a>
              @endif
                  <a> |</a>
              @if($activo=='presupuesto')
                  <a class="activo" style="word-spacing: 3px;" href="{{ url('presupuesto') }}" > SOLICITUD DE PRESUPUESTO</a> 
              @else
                  <a style="word-spacing: 3px;" href="{{ url('presupuesto') }}" > SOLICITUD DE PRESUPUESTO</a> 
              @endif
                  <a> |</a>
              @if($activo=='clientes')
                  <a class="activo" href="{{ url('/clientes') }}" > CLIENTES      </a>
              @else
              <a href="{{ url('/clientes') }}" > CLIENTES      </a>
              @endif
            </div>
        </div>
          </div>
           <!-- navbar content here  --> 
    </div>
  </div>

{{-- Para moviles --}}
<ul class="sidenav" id="mobile-demo" style="position: absolute;color: #7D0045;">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/') }}">
                    <span class="side">
                        INICIO
                    </span>
                    <i class="material-icons">
                        home
                    </i>
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/empresa') }}">
                    <i class="material-icons">
                        group
                    </i>
                    EMPRESA
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('categorias') }}">
                    <i class="material-icons">
                        map
                    </i>
                    PRODUCTOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('servicios') }}">
                    <i class="material-icons">
                        new_releases
                    </i>
                    SERVICIOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/contacto', 'General') }}">
                    <i class="material-icons">
                        contact_mail
                    </i>
                    CONTACTO
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('categoriaobras') }}">
                    <i class="material-icons">
                        build
                    </i>
                    OBRAS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('presupuesto') }}">
                    <i class="material-icons">
                        format_list_numbered
                    </i>
                    PRESUPUESTO
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('clientes') }}">
                    <i class="material-icons">
                        people
                    </i>
                    CLIENTES
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('trabaja') }}">
                    <i class="material-icons">
                        work
                    </i>
                    TRABAJA CON NOSOTROS
                </a>
            </li>
        </ul>
    </ul>
</header>