<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Certificacion;
use App\Http\Controllers\Controller;

class CertificacionesController extends Controller
{
    public function create()
    {
        $certificacion = certificacion::all()->first();
        return redirect()->route('certificaciones.edit', $certificacion->id);
    }

    public function edit($id)
    {
        $certificacion = certificacion::find($id);
        return view('adm.certificaciones.edit')
            ->with('certificacion', $certificacion);
    }

    public function update(Request $request, $id)
    {
        $contacto              = certificacion::find($id);
        $contacto->contenido      = $request->contenido;
        $contacto->update();

        return view('adm.dashboard');
    }
}
