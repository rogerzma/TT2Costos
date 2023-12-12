<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReporteStore;
use App\Models\Cultivo;
use App\Models\Costos;

class cultivoControlador extends Controller
{
    public function get(){
        try {
            $cultivo = Cultivo::all();
            return view('ListaCultivos', compact('cultivo'));
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    public function create(Request $request)
    {
        //dd($request->all());
        // Obtén todos los datos del formulario
        $data = $request->all();

        // Extrae los datos generales
        $nombre = $data['nombre'];
        $tipo = $data['tipo'];
        $modalidad = $data['modalidad'];
        $ciclo = $data['ciclo'];
        $rendimiento = $data['rendimiento'];

        // Itera a través de los datos de costos
        $costos = [];
        $numFilasCostos = $data['num_filas_costos'];

        for ($i = 0; $i < $numFilasCostos; $i++) {
            $concepto = $data['costo'][$i]['concepto'];
            $insumo = $data['costo'][$i]['insumo'];
            $unidad = $data['costo'][$i]['unidad'];
            $cantidad = $data['costo'][$i]['cantidad'];
            $precio = $data['costo'][$i]['precio'];

            // Guarda estos datos en una estructura adecuada, como un array asociativo
            if ($concepto !== null || $insumo !== null || $unidad !== null || $cantidad !== null || $precio !== null) {
                // Guarda estos datos en una estructura adecuada, como un array asociativo
                $costos[] = [
                    'concepto' => $concepto,
                    'insumo' => $insumo,
                    'unidad' => $unidad,
                    'cantidad' => $cantidad,
                    'precio' => $precio,
                ];
            }
        }
        // Por ejemplo, con Eloquent:
        $cultivo = new Cultivo;
        $cultivo->nombre = $nombre;
        $cultivo->tipo = $tipo;
        $cultivo->modalidad = $modalidad;
        $cultivo->ciclo = $ciclo;
        $cultivo->rendimiento = $rendimiento;
        $cultivo->save();

        // Asocia los costos al cultivo
        if (!empty($costos)) {
            $cultivo->costos()->createMany($costos);
        }

        // Redirecciona a la página deseada
        return redirect()->route('ListaCultivos');
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->input('id');
        
        // Obtén el cultivo existente que deseas actualizar
        $cultivo = Cultivo::find($id);
    
        // Verifica si el cultivo existe
        if (!$cultivo) {
            return redirect()->route('ListaCultivos')->with('error', 'El cultivo no se encontró.');
        }
    
        // Obtén todos los datos del formulario
        $data = $request->all();
    
        // Actualiza los campos generales
        $cultivo->nombre = $data['nombre'];
        $cultivo->tipo = $data['tipo'];
        $cultivo->modalidad = $data['modalidad'];
        $cultivo->ciclo = $data['ciclo'];
        $cultivo->rendimiento = $data['rendimiento'];
        $cultivo->save();
    
        // Itera a través de los datos de costos
        $costos = [];
        $numFilasCostos = $data['num_filas_costos'];
    
        for ($i = 0; $i < $numFilasCostos; $i++) {
            $concepto = $data['costo'][$i]['concepto'];
            $insumo = $data['costo'][$i]['insumo'];
            $unidad = $data['costo'][$i]['unidad'];
            $cantidad = $data['costo'][$i]['cantidad'];
            $precio = $data['costo'][$i]['precio'];
    
            // Guarda estos datos en una estructura adecuada, como un array asociativo
            $costos[] = [
                'concepto' => $concepto,
                'insumo' => $insumo,
                'unidad' => $unidad,
                'cantidad' => $cantidad,
                'precio' => $precio,
            ];
        }

    
        // Actualiza los costos del cultivo
        $cultivo->costos()->delete(); // Elimina todos los costos existentes
        $cultivo->costos()->createMany($costos); // Crea los nuevos costos
    
        // Redirecciona a la página deseada
        return redirect()->route('ListaCultivos')->with('success', 'Cultivo actualizado con éxito.');
    }

        public function edit($id)
        {
            try {
                $cultivo = Cultivo::find($id);

                if (!$cultivo) {
                    return redirect()->route('ListaCultivos')->with('error', 'El cultivo no existe');
                }

                // Cargar los costos relacionados con el cultivo
                $costos = Costos::where('cultivo_id', $cultivo->id)->get();
                $numFilasTotal = count($costos);

                return view('ActualizaCultivo', compact('cultivo', 'costos', 'numFilasTotal'));
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()], 500);
            }
        }
    public function delete($id)
        {
        try {
            $cultivo = Cultivo::find($id);

            if ($cultivo) {
                $cultivo->delete();
                return redirect()->route('ListaCultivos')->with('success', 'Reporte eliminado exitosamente');
            } else {
                return response()->json(["message" => "El reporte no se encontró"], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

}
