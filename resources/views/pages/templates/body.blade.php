<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <title>
                                :: Aberturas General Paz :: - @yield('titulo')
                            </title>

                            <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png"/>
                            
                            <link href="{{ asset('css/pages/layouts/header.css') }}" rel="stylesheet">
                                <link href="{{ asset('css/pages/layouts/footer.css') }}" rel="stylesheet">
                                    @yield('css')
                              <!--     
                               <?php 
header('Access-Control-Allow-Origin: *'); 
?>
                                    <link href="http://allfont.es/allfont.css?fonts=raleway-extrabold" rel="stylesheet" type="text/css" />-->
                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
                                    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800,900" rel="stylesheet" type="text/css"/>
                                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>

                                        <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">

                                            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

       <!--    <script type="text/javascript" src="http://osolelaravel.com/drimer/js/materialize.min.js"></script>-->
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>

    </head>
    <body>
        <!-- CABECERA -->
        <header>
            @include('pages.templates.header')
            <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
        </script>
        </header>
        <main style="">
            @yield('contenido')
        </main>
        @include('pages.templates.footer') 
        <!--Import jQuery before materialize.js-->

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
        </script>
        <!-- Materialize Core JavaScript -->
        <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
        </script>
        @yield('js')
        <script type="text/javascript">
            $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();

  });
        $('.dropdown-button').dropdown({
          hover: true
        });

        $(document).ready(function(){
    $('.modal').modal();
  });
    </script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b500d1fdf040c3e9e0bb892/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>
</html>