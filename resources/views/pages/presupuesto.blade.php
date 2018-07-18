@extends('pages.templates.body')
@section('title', 'Aberturas General Paz - Consejos de Seguridad')
@section('css')
<link href="{{ asset('css/pages/clientes.css') }}" rel="stylesheet"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endsection
@section('contenido')

@if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 black-text text-darken-4 center" style="margin-top: 0px;">
    <ul>
        @foreach($errors->all() as $error)
            <li>{!!$error!!}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4 center" style="margin-top: 0px;">
    {{ session('success') }}
</div>
@endif

<div align="center">
<?php
if(isset($_GET['mensaje'])){
    if($_GET['mensaje']=="ok"){ ?>

        <div class="alert alert-success text-center" role="alert" style="background: #007E00; border-bottom: 1px solid gray;">
            <?php echo "¡El mensaje se envió correctamente!" ?>
        </div>

    <?php }else{ ?>

        <div class="alert alert-danger text-center" role="alert"  style="background: orange; border-bottom: 1px solid gray;">
            <?php echo "¡Error al enviar el mensaje!"?>
        </div>

    <?php }
}
?>
</div>

{!!Form::open(['route'=>'enviarmail', 'method'=>'POST', 'files' => true])!!}
<div class="container" style="margin-bottom: 100px;">
    <div class="row" style="margin-top: 100px;">
        <div id="estado1" >
            <div class="col l12">
                <div align="center">
                    <img class="responsive-img" style="align-items: center;" src="{{asset('img/presupuesto1.jpg')}}">
                </div>
                <br><br>
                <div class="row">
                    <div class="input-field col l5 m6 s12 push-l1">
                        <input type="text" id="nombre" name="nombre"  class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col l5 m6 s12 push-l1">
                        <input type="text" id="localidad" name="localidad"  class="validate">
                        <label for="localidad">Localidad</label>
                    </div>
                    <div class="input-field col l5 m6 s12 push-l1">
                        <input type="text" id="email" name="email"  class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col l5 m6 s12 push-l1">
                        <input type="text" id="telefono" name="telefono"  class="validate">
                        <label for="telefono">Teléfono</label>
                    </div>
                    <div class="input-field col l5 m6 s12 pull-l1 right">
                        <button type="button" id="botonSiguienteEstado" class="btn right z-depth-0" style="margin-top: 20px; background-color:#A70000; color:white; font-weight: bold;">Siguiente</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="estado2" style="display: none;">
        <div class="col l12">
            <div align="center">
                <img class="responsive-img" style="align-items: center;" src="{{asset('img/presupuesto2.jpg')}}">
            </div>
            <div class="row">
                <div class="input-field col l5 m6 s12 push-l1">
                    <textarea id="mensaje" name="mensaje"  class="materialize-textarea validate"></textarea>
                    <label for="mensaje">Mensaje</label>
                </div>
                <div align="right">
                  <div class="file-field col l5 m6 s12 push-l1">
                    <div class="btn" style="background: #A70000;">
                      <span>Examinar</span>
                      <input type="file" id="imagen" name="imagen">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" file">
                    </div>
                  </div>
                </div>
                <div class="input-field col l5 m6 s12 pull-l1 right">
                    <button type="button" id="botonEstadoAnterior" class="btn center z-depth-0" style="margin-top: 20px; background-color:white; border:1px solid #A70000; color:black;">Anterior</a>
                    <button type="submit" id="botonSiguienteAnterior" class="btn right z-depth-0" style="margin-top: 20px; background-color:#A70000; color:white; font-weight: bold;">Enviar</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>

    document.getElementById("botonSiguienteEstado").addEventListener("click", mostrarEstado2);
    document.getElementById("botonEstadoAnterior").addEventListener("click", mostrarEstado1);

    function mostrarEstado2() {
        document.getElementById("estado1").className = "animated bounceOutLeft";
        setTimeout(function(){ 
            document.getElementById("estado1").style.display = "none"; 
            document.getElementById("estado2").style.display = "block";
            document.getElementById("estado2").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos col m2 col l2 offset-m1";
            document.getElementById("elDiv2").className = "paso obra active col m4 col l4 push-l3";
        }, 200);

    }
    
    function mostrarEstado1() {
        document.getElementById("estado2").className = "animated bounceOutLeft";
        
        setTimeout(function(){ 
            document.getElementById("estado2").style.display = "none"; 
            document.getElementById("estado1").style.display = "block";
            document.getElementById("estado1").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos active col m2 col l2 offset-m1";
            document.getElementById("elDiv2").className = "paso obra col l2 col m4 col l4 push-l3";
        }, 1);
    }
    
    function animacion(id, clase) {
        $(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass("animated "+clase);
        });
    };

</script>




</body>
</html>

        @endsection

@section('js')

        
<script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>

<script type="text/javascript">
 $(document).ready(function(){
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    closeOnClick: false,
    fullWidth: false,
    hover: 1,
  });
   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('.modal').modal();
  });
</script>
        @endsection
