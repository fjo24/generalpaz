<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Modelo;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    public function index()
    {
        $modelos = Modelo::orderBy('id', 'ASC')->get();
        return view('adm.modelos.index', compact('modelos'));
    }

    public function create()
    {
        return view('adm.modelos.create');
    }

    public function store(Request $request)
    {
        $modelo              = new Modelo();
        $modelo->nombre      = $request->nombre;
        $modelo->descripcion = $request->descripcion;
        $modelo->orden       = $request->orden;
        $id                  = Modelo::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/modelos/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $modelo->imagen = 'img/modelos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $modelo->save();

        return redirect()->route('modelos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $modelo       = Modelo::find($id);
        return view('adm.modelos.edit', compact('modelo'));
    }

    public function update(Request $request, $id)
    {
        $modelo                    = Modelo::find($id);
        $modelo->nombre      = $request->nombre;
        $modelo->descripcion = $request->descripcion;
        $modelo->orden       = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/modelos/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $modelo->imagen = 'img/modelos/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $modelo->save();
        return redirect()->route('modelos.index');
    }

    public function destroy($id)
    {
        $modelo = Modelo::find($id);
        $modelo->delete();
        return redirect()->route('modelos.index');
    }

}
