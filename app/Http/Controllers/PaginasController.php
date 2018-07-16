<?php

namespace App\Http\Controllers;

use App\Categoria;
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

}
