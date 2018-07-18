<ul class="listado_categorias collapsible" style="    border: none;">
    @foreach($categorias as $cat)  
                            @if($categoria->id==$cat->id)
    <li class="active">
        @else
        <li>
            @endif
            <a href="{{ route('productos', $cat->id)}}">
                <div class="categorias_header collapsible-header">
                    {{$cat->nombre}}
                                        
                                            @if($categoria->id==$cat->id)
                    <i class="flechita material-icons" style="position: absolute;left: 23%;">
                        keyboard_arrow_down
                    </i>
                    @else
                    <i class="flechita material-icons" style="position: absolute;left: 23%;">
                        keyboard_arrow_right
                    </i>
                    @endif
                </div>
            </a>
            <div class="collapsible-body">
                <ul>
                    @foreach($cat->productos as $producto)
                    <li style="margin: 4px 0;">
                        <a href="{{ route('productoinfo', $producto->id)}}">
                            <span>
                                {{$producto->nombre}}
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </li>
        @endforeach
    </li>
</ul>