<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Metadato;
use App\Contenido_home;
use App\User;
use App\Dato;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\Empresa;
use App\Local;
use App\Novedad;
use App\Contactotext;
use App\Producto;
use App\Servicio;   
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'home';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $contenido = Contenido_home::all()->first();
        return view('pages.home', compact('sliders', 'servicios', 'banner', 'contenido', 'activo'));
    }

    public function categorias(){
        $metadato= metadato::where('seccion','productos')->first();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.categorias', compact('categorias', 'metadato'));
    }

    public function productos($id)
    {
        $categoria = Categoria::find($id);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('categoria_id', $id)->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.productos', compact('productos', 'categoria', 'ready', 'categorias', 'id'));
    }

    public function productoinfo($id)
    {
        $p = Producto::find($id);
        $idcat= $p->categoria_id;
        $categoria = Categoria::find($idcat);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('categoria_id', $id)->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.productoinfo', compact('productos', 'categoria', 'ready', 'categorias', 'p'));
    }

}
