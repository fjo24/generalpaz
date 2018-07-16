<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Tipovidrio;
use Illuminate\Http\Request;

class TiposvidrioController extends Controller
{
    public function index()
    {
        $tiposvidrios = Tipovidrio::orderBy('id', 'ASC')->get();
        return view('adm.tiposvidrio.index', compact('tiposvidrios'));
    }

    public function create()
    {
        return view('adm.tiposvidrio.create');
    }

    public function store(Request $request)
    {
        $tipo                    = new Tipovidrio();
        $tipo->nombre            = $request->nombre;
        $tipo->descripcion         = $request->descripcion;
        $tipo->contenido         = $request->contenido;
        $tipo->orden             = $request->orden;
        $id                      = Tipovidrio::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/tiposvidrio/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $tipo->imagen = 'img/tiposvidrio/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $tipo->save();

        return redirect()->route('tiposvidrio.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tipo       = Tipovidrio::find($id);
        return view('adm.tiposvidrio.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $tipo                    = Tipovidrio::find($id);
        $tipo->nombre            = $request->nombre;
        $tipo->descripcion         = $request->descripcion;
        $tipo->contenido         = $request->contenido;
        $tipo->orden             = $request->orden;
        $id                      = Tipovidrio::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/tipos/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $tipo->imagen = 'img/tipos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $tipo->save();
        return redirect()->route('tiposvidrio.index');
    }

    public function destroy($id)
    {
        $obra = Obra::find($id);
        $obra->delete();
        return redirect()->route('obras.index');
    }

    public function imagenes($id)
    {
        $imagenes = Obra_imagen::orderBy('id', 'ASC')->Where('obra_id', $id)->get();

        $obra = Obra::find($id);
        return view('adm.obras.imagenes')->with(compact('imagenes', 'obra'));
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/obra/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen          = new Obra_imagen;
                $imagen->imagen  = 'img/obra/' . $id . '_' . $file->getClientOriginalName();
                $imagen->obra_id = $id;
                $imagen->save();
            }
        }
        $imagenes = Obra_imagen::orderBy('id', 'ASC')->Where('obra_id', $id)->get();

        $obra = Obra::find($id);
        return view('adm.obras.imagenes')->with(compact('imagenes', 'obra'));
    }

    public function destroyimg($id)
    {
        $imagen = Obra_imagen::find($id);
        $idobra = $imagen->obra_id;
        $imagen->delete();
        $imagenes = Obra_imagen::orderBy('id', 'ASC')->Where('obra_id', $idobra)->get();

        $obra = Obra::find($idobra);
        return view('adm.obras.imagenes')->with(compact('imagenes', 'obra'));
    }
}
