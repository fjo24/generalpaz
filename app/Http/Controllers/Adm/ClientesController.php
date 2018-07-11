<?php

namespace App\Http\Controllers\adm;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClientesRequest;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nombre', 'ASC')->paginate(10);
        return view('adm.clientes.index')
            ->with('clientes', $clientes);
    }

    public function create()
    {
        return view('adm.clientes.create');
    }

    public function store(Request $request)
    {
        $cliente         = new cliente();
        $cliente->nombre = $request->nombre;
        $cliente->orden  = $request->orden;
        $cliente->link   = $request->link;
        $id              = Cliente::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/clientes/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $cliente->imagen = 'img/clientes/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $cliente->save();

        return redirect()->route('clientes.index');

    }
    public function edit($id)
    {
        $cliente = cliente::find($id);
        return view('adm.clientes.edit')
            ->with('cliente', $cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente         = cliente::find($id);
        $id              = cliente::all()->max('id');
        $cliente->nombre = $request->nombre;
        $cliente->link   = $request->link;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/clientes/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $cliente->imagen = 'img/clientes/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $cliente->update();
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        $cliente = cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
