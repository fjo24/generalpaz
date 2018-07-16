<header>
<nav class="header-nav">
  <div class="container nav-flex">
    <div class="container">
      
          <a href="/" class="logo-header"><img class="logo-imagen" src="{{asset('img/logo_principal.png')}}" alt=""></a>
          <div class="right hide-on-med-and-down">
            <div class="redes-header">
              <a href="{{ url('servicios') }}" > SERVICIOS     </a>
                  <a> |</a>
                  <a href="{{ url('obra') }}" > OBRA     </a>
                  <a> |</a>
                  <a href="{{ url('fabrica') }}" > TRABAJA CON NOSOTROS      </a>
              <a href="{{ $facebook->link}}" class="iconos-redes"><img src="{{asset('img/redes/facebook.jpg')}}"></a>
              <a href="{{ $instagram->link}}" class="iconos-redes"><img src="{{asset('img/redes/instagram.jpg')}}"></a>
              
            </div>  


        <div class="banda">
            <div class="linksheader" style="width: 1200px; color: black;">
                  <a href="{{ url('empresa') }}" > EMPRESA     </a>
                  <a> |</a>
                  <a href="{{ url('categorias') }}" > PRODUCTOS      </a>
                  <a> |</a>
                  <a href="{{ url('servicios') }}" > SERVICIOS     </a>
                  <a> |</a>
                  <a href="{{ url('obra') }}" > OBRA     </a>
                  <a> |</a>
                  <a href="{{ url('fabrica') }}" > FÁBRICA      </a>
                  <a> |</a>
                  <a href="{{ url('presupuesto') }}" > SOLICITUD DE PRESUPUESTO</a> 
            </div>
        </div>
          </div>
           <!-- navbar content here  --> 





    </div>
  </div>
</nav>

</header>