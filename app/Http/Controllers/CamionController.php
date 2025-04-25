<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    public function index()
    {
        $camiones = Camion::with('empresa')->get();
        return view('admin.camiones.index', compact('camiones'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('admin.camiones.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:20',
            'modelo' => 'nullable|string|max:50',
            'capacidad' => 'nullable|integer',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        Camion::create($request->all());

        return redirect()->route('admin.camiones.index')
            ->with('mensaje', 'Camión registrado correctamente')
            ->with('icono', 'success');
    }

    public function edit($id)
    {
        $camion = Camion::findOrFail($id);
        $empresas = Empresa::all();
        return view('admin.camiones.edit', compact('camion', 'empresas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required|string|max:20',
            'modelo' => 'nullable|string|max:50',
            'capacidad' => 'nullable|integer',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $camion = Camion::findOrFail($id);
        $camion->update($request->all());

        return redirect()->route('admin.camiones.index')
            ->with('mensaje', 'Camión actualizado correctamente')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $camion = Camion::findOrFail($id);
        $camion->delete();

        return redirect()->route('admin.camiones.index')
            ->with('mensaje', 'Camión eliminado correctamente')
            ->with('icono', 'success');
    }
}
