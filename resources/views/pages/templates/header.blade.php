<header>
<nav class="header-nav">
  <div class="container nav-flex">
    <div class="container">
      
          <a href="/" class="logo-header"><img class="logo-imagen" src="{{asset('img/logo_principal.png')}}" alt=""></a>
          <div class="right hide-on-med-and-down">
            <div class="redes-header" style="word-spacing: 10px;">
              <img src="{{asset('img/redes/whatsapp.jpg')}}"><a href="{{ url('servicios') }}" style="color: #F7F7F7;font-size: 16px;font-family: 'Source Sans Pro', sans-serif;word-spacing: 3px;"> Whats App · {{ $telefono2->descripcion}}    </a>
                  <a style="color: black;"> |</a>
                  <a href="{{ url('obra') }}" style="color: black;"> CONTACTO     </a>
                  <a style="color: black;"> |</a>
                  <a href="{{ url('fabrica') }}" style="color: black;"> TRABAJA CON NOSOTROS      </a>
                  <a href="{{ $facebook->link}}" class="iconos-redes"><img src="{{asset('img/redes/buscador.jpg')}}"></a>
              <a href="{{ $facebook->link}}" class="iconos-redes"><img src="{{asset('img/redes/facebook.jpg')}}"></a>
              <a href="{{ $instagram->link}}" class="iconos-redes"><img src="{{asset('img/redes/instagram.jpg')}}"></a>
              
            </div>  


        <div class="banda">
            <div class="linksheader" style="width: 1145px; color: black;position: relative;right: 11%;">
                  <a href="{{ url('empresa') }}" > EMPRESA     </a>
                  <a> |</a>
                  <a href="{{ url('categorias') }}" > PRODUCTOS      </a>
                  <a> |</a>
                  <a href="{{ url('servicios') }}" > SERVICIOS     </a>
                  <a> |</a>
                  <a href="{{ url('obra') }}" > OBRA     </a>
                  <a> |</a>
                  <a style="word-spacing: 3px;" href="{{ url('presupuesto') }}" > SOLICITUD DE PRESUPUESTO</a> 
                  <a> |</a>
                  <a href="{{ url('fabrica') }}" > CLIENTES      </a>
            </div>
        </div>
          </div>
           <!-- navbar content here  --> 





    </div>
  </div>
</nav>

</header>