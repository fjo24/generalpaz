<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Certificacion;
use App\Imgcertificacion;
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
        $imagenes = Imgcertificacion::orderBy('id', 'ASC')->get();
        $certificacion = certificacion::find($id);
        return view('adm.certificaciones.edit')
            ->with('certificacion', $certificacion)->with('imagenes', $imagenes);
    }

    public function update(Request $request, $id)
    {
        $contacto              = certificacion::find($id);
        $contacto->contenido      = $request->contenido;
        $contacto->update();

        return view('adm.dashboard');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgcertificacion::orderBy('id', 'ASC')->get();
        return view('adm.certificaciones.imagenes')->with(compact('imagenes'));
    }

    public function nuevaimagen(Request $request)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/certificaciones/');
                $file->move($path, $file->getClientOriginalName());
                $imagen              = new Imgcertificacion;
                $imagen->imagen   = 'img/certificaciones/' . $file->getClientOriginalName();
                $imagen->nombre = 'certificado';
                $imagen->save();
            }
        }
        $imagenes = Imgcertificacion::orderBy('id', 'ASC')->get();

        //$cer = certificacion::all()->first();
        $certificacion = certificacion::all()->first();
        return view('adm.certificaciones.edit')->with(compact('imagenes', 'certificacion'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgcertificacion::find($id);
        $idpro  = $imagen->producto_id;
        $imagen->delete();
        $imagenes = Imgcertificacion::orderBy('id', 'ASC')->get();

        $certificacion = certificacion::all()->first();
        return view('adm.certificaciones.edit')->with(compact('imagenes', 'certificacion'));
    }
}
