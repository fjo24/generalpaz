<footer class="page-footer">
    <div class="container" style="width: 100%">
        <div class="row" style="display:  flex; align-items:  center;">
            <div class="col l12 s12 m12">
                <div class="footer-a col l6 s12 m6">
                    <div class="col l12 logo_footer center" style="    margin-top: 2%;">
                        <img src="{{asset('img/logo_footer.png')}}">
                    </div>
                    <div class="col l3 s12 m4">
                        <div class="logos center">
                            <img src="{{asset('img/layouts/logo1.png')}}">
                        </div>
                    </div>
                    <div class="col l3 s12 m4">
                        <div class="logos center">
                            <img src="{{asset('img/layouts/logo2.png')}}">
                        </div>
                    </div>
                    <div class="col l3 s12 m4">
                        <div class="logos center">
                            <img src="{{asset('img/layouts/logo3.png')}}">
                        </div>
                    </div>
                    <div class="col l3 s12 m4">
                        <div class="logos center">
                            <img src="{{asset('img/layouts/logo4.png')}}">
                        </div>
                    </div>
                    <div class="col l7 s12 m7">
                        <div class="logos center">
                            <img src="{{asset('img/layouts/logo5.png')}}">
                        </div>
                    </div>
                    <div class="col l5 s12 m5">
                        <div class="logos center">
                            <img src="{{asset('img/layouts/logo6.png')}}">
                        </div>
                    </div>
                </div>
                <div class="leftitems col l3 s6 m3">
                <h5 class="titulo-footer">
                    SITEMAP
                </h5>
                <div class="links">
                    <div class="listlinks col l6 m6">
                        <ul>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Mantenimiento
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Productos
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Empresa
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="listlinks col l6 m6">
                        <ul style="">
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Consejos de Seguridad
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Obras
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Clientes
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    Contacto
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="rightitems col l3 s12 m3 hide-on-med-and-down left">
                <h5 class="titulo-footer">
                    EXCELSIOR S.A.
                </h5>
                <div class="links2">
                    <div class="listlinks2 col l12 m12">
                        <ul>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/ubicacion.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                        {{$direccion->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/telefono.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                        {{$telefono->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/telefono2.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                       {{$telefono2->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/mail.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                        {{$email->descripcion}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</footer>
