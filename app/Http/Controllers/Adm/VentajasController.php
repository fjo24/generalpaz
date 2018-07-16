<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Ventaja;
use Illuminate\Http\Request;

class VentajasController extends Controller
{
    public function index()
    {
        $ventajas = Ventaja::orderBy('id', 'ASC')->get();
        return view('adm.ventajas.index', compact('ventajas'));
    }

    public function create()
    {
        return view('adm.ventajas.create');
    }

    public function store(Request $request)
    {
        $ventaja         = new ventaja();
        $ventaja->nombre = $request->nombre;
        $ventaja->orden  = $request->orden;
        $id              = ventaja::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/ventajas/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $ventaja->imagen = 'img/ventajas/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $ventaja->save();

        return redirect()->route('ventajas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ventaja       = Ventaja::find($id);
        return view('adm.ventajas.edit', compact('ventaja'));
    }

    public function update(Request $request, $id)
    {
        $ventaja                    = Ventaja::find($id);
        $ventaja->nombre      = $request->nombre;
        $ventaja->orden       = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/ventajas/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $ventaja->imagen = 'img/ventajas/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $ventaja->save();
        return redirect()->route('ventajas.index');
    }

    public function destroy($id)
    {
        $ventaja = Ventaja::find($id);
        $ventaja->delete();
        return redirect()->route('ventajas.index');
    }

}
