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
use App\Imgcertificacion;
use App\Local;
use App\Novedad;
use App\Categoria_obra;
use App\Obra;
use App\Cliente;
use App\Producto;
use App\Certificacion;
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
        $home = Contenido_home::all()->first();
        $destacados = Destacado_home::OrderBy('orden', 'ASC')->get();
        return view('pages.home', compact('sliders', 'home', 'destacados','activo'));
    }

    public function empresa()
    {
        $activo    = 'empresa';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $contenido = Empresa::all()->first();
        $imagenes = Imgcertificacion::orderBy('id', 'ASC')->get();
        $certificacion = Certificacion::all()->first();
        return view('pages.empresa', compact('sliders', 'contenido', 'imagenes', 'certificacion', 'activo'));
    }

    public function servicios()
    {
        $activo = 'servicios';
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'servicios')->get();
        return view('pages.servicios', compact('sliders', 'servicios', 'activo'));
    }


    public function categorias(){
        $activo    = 'productos';
        $metadato= metadato::where('seccion','productos')->first();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.categorias', compact('categorias', 'metadato', 'activo'));
    }

    public function productos($id)
    {
        $activo    = 'productos';
        $categoria = Categoria::find($id);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('categoria_id', $id)->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.productos', compact('productos', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }

    public function productoinfo($id)
    {
        $activo    = 'productos';
        $p = Producto::find($id);
        $idcat= $p->categoria_id;
        $categoria = Categoria::find($idcat);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('categoria_id', $id)->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.productoinfo', compact('productos', 'categoria', 'ready', 'categorias', 'p', 'activo'));
    }

    public function categoriaobras()
    {
        $activo    = 'obras';
        $obras = Categoria_obra::OrderBy('orden', 'asc')->get();
        return view('pages.catobras', compact('obras', 'activo'));
    }

    public function obras($id)
 {
    $activo    = 'obras';
        $categoria = Categoria_obra::find($id);
        $ready     = 0;
        $servicios = Producto::OrderBy('orden', 'ASC')->get();
        $obras     = Obra::OrderBy('orden', 'ASC')->where('categoria_obra_id', $id)->get();
        return view('pages.obras', compact('obras', 'ready', 'categoria', 'servicios', 'activo'));
    }

    public function contacto($producto)
    {
        //return ($producto);
        $activo = 'contacto';
        $dato = $producto;
        return view('pages.contacto', compact('activo', 'producto', 'contenido'));
    }

    public function enviarmailcontacto(Request $request)
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

        $busqueda = $request->nombre;

        $busca = 1;
        $ready = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo    = 'buscar';
        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
        $categoria = null;
        $activo        = 'productos';
        $categorias    = Categoria::orderBy('orden', 'asc')->get();

        $todos         = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
        $ready = 0;

        return view('pages.busqueda', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ready', 'categoria', 'activo'));

    }

    public function clientes()
    {
        $activo    = 'clientes';
        $clientes = Cliente::orderBy('orden', 'ASC')->get();
        return view('pages.clientes', compact('clientes', 'activo'));
    }

    public function trabaja()
    {
        //return ($producto);
        $activo = 'trabaja';
        return view('pages.trabaja', compact('activo', 'contenido'));
    }

    public function enviarcv(Request $request)
    {
        $activo   = 'trabaja';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $telefono  = $request->telefono;
        $email    = $request->email;
        $documento = $request->documento;
        $domicilio  = $request->domicilio;
        $newid = 'cvs_';
        if ($request->hasFile('archivo')) {
            if ($request->file('archivo')->isValid()) {
                $file = $request->file('archivo');
                $path = public_path('img/archivos/');
                $request->file('archivo')->move($path, $newid.'_'.$file->getClientOriginalName());
                $archivo = 'img/archivos/' . $newid.'_'.$file->getClientOriginalName();
                
            }
        }

           // dd($request);
        Mail::send('pages.emails.trabajamail', ['nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $telefono, 'email' => $email, 'documento' => $documento, 'domicilio' => $domicilio], function ($message) use ($archivo){

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Aberturas General Paz');

            //Attach file
            $message->attach($archivo);

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Candidato: ');

        });
        if (Mail::failures()) {
            return view('pages.trabaja', compact('activo', 'contenido'));
        }
        return view('pages.trabaja', compact('activo', 'contenido'));
    }

    
}
