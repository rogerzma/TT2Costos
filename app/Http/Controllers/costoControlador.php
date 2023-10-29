<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReporteStore;
use App\Models\Cultivo;
use App\Models\Costos;

class costoControlador extends Controller
{
    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class);
    }
    public function create(Request $request)
    {
        try {
            $data = $request->only([
                'concepto',
                'insumo',
                'unidad',
                'cantidad',
                'precio',
            ]);

            // Obtén el ID del cultivo al que pertenecen estos costos (puedes pasarlo desde el formulario o desde otra fuente)
            $cultivoId = $request->input('cultivo_id');

            // Asocia estos costos al cultivo correspondiente
            $costo = new Costos($data);
            $costo->cultivo_id = $cultivoId;
            $costo->save();

            return redirect()->route('ListaCultivos')->with('success', 'Costo creado exitosamente');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
