<?php

namespace App\Http\Controllers\adm;

use App\Categoria_obra;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObrasRequest;
use App\Obra;
use App\Obra_imagen;
use Illuminate\Http\Request;

class ObrasController extends Controller
{
    public function index()
    {
        $obras = obra::orderBy('id', 'ASC')->get();
        return view('adm.obras.index', compact('obras'));
    }

    public function create()
    {
        $categorias = Categoria_obra::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.obras.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $obra                    = new Obra();
        $obra->nombre            = $request->nombre;
        $obra->descripcion         = $request->descripcion;
        $obra->categoria_obra_id = $request->categoria_obra_id;
        $obra->orden             = $request->orden;
        $id                      = Obra::all()->max('id');
        $id++;
        $obra->save();
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

        return redirect()->route('obras.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categorias = Categoria_obra::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $obra       = Obra::find($id);
        return view('adm.obras.edit', compact('obra', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $obra                    = Obra::find($id);
        $obra->nombre            = $request->nombre;
        $obra->descripcion            = $request->descripcion;
        $obra->categoria_obra_id = $request->categoria_obra_id;
        $obra->orden             = $request->orden;

        $obra->save();
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

        return redirect()->route('obras.index');
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
