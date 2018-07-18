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
use App\Categoria_obra;
use App\Obra;
use App\Cliente;
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

    public function empresa()
    {
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $contenido = Empresa::all()->first();
        return view('pages.empresa', compact('sliders', 'contenido'));
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

    public function categoriaobras()
    {
        $obras = Categoria_obra::OrderBy('orden', 'asc')->get();
        return view('pages.catobras', compact('obras'));
    }

    public function obras($id)
    {
        $categoria = Categoria_obra::find($id);
        $ready     = 0;
        $servicios = Producto::OrderBy('orden', 'ASC')->get();
        $obras     = Obra::OrderBy('orden', 'ASC')->where('categoria_obra_id', $id)->get();
        return view('pages.obras', compact('obras', 'ready', 'categoria', 'servicios'));
    }

    public function contacto($producto)
    {
        //return ($producto);
        $activo = 'contacto';
        $dato = $producto;
        return view('pages.contacto', compact('activo', 'producto', 'contenido'));
    }

    public function enviarmail(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $producto = $request->producto;
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;
       //     dd($producto);
        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'apellido' => $apellido, 'empresa' => $empresa, 'email' => $email, 'mensaje' => $mensaje, 'producto' => $producto], function ($message) use ($producto){



            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Aberturas General Paz');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta de web de producto: ' .$producto);

        });
        if (Mail::failures()) {
            return view('pages.contacto', compact('activo', 'General'));
        }
        $producto = 'General';
        return view('pages.contacto', compact('activo', 'producto'));
    }

    public function buscar(Request $request)
    {

        $busqueda = $request->buscar;

        $busca = 1;
        $ready = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo    = 'productos';
        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->
            orwhere('codigo', 'like', '%' . $busqueda . '%')->get();

        $activo        = 'productos';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('nombre', 'like', '%' . $busqueda . '%')->
            orwhere('codigo', 'like', '%' . $busqueda . '%')->get();
        $ready = 0;

        return view('pages.productos', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ready'));

    }

    public function clientes()
    {
        $clientes = Cliente::orderBy('orden', 'ASC')->get();
        return view('pages.clientes', compact('clientes'));
    }

}
