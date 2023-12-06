<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use Illuminate\Support\Facades\Auth;

class MovimientoController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $movimientos = Movimiento::where('user_id', $user->id)->latest()->get();
        $sumaIngresos = $movimientos->where('tipo', 'Ingreso')->sum('cantidad');
        $sumaGastos = $movimientos->where('tipo', 'Gasto')->sum('cantidad');
        
        return view('dashboard', compact('movimientos', 'sumaIngresos', 'sumaGastos'));
    }

    public function create()
    {
        return view('movimientos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:Ingreso,Gasto',
            'fecha' => 'required|date',
            'categoria' => 'required|string',
            'cantidad' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->movimientos()->create($request->all());

        return redirect()->route('dashboard')->with('success', 'Movimiento registrado exitosamente.');
    }

    public function edit($id)
    {
        $movimiento = Movimiento::findOrFail($id);

        return view('movimientos.edit', compact('movimiento'));
    }

    public function update(Request $request, $id)
    {
        

        // Obtener el movimiento por ID
        $movimiento = Movimiento::findOrFail($id);

        // Actualizar los campos del movimiento
        $movimiento->update([
            'fecha' => $request->fecha,
            'categoria' => $request->categoria,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('dashboard')->with('success', 'Movimiento actualizado exitosamente.');
    }




    public function destroy($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->delete();

        return redirect()->route('dashboard')->with('success', 'Movimiento eliminado exitosamente.');
    }
}
