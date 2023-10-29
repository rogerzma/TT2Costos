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
        try {
            // Obtén los datos del cultivo
            $cultivoData = $request->only([
                'nombre',
                'tipo',
                'modalidad',
                'ciclo',
                'rendimiento',
            ]);

            // Crea el cultivo
            $cultivo = Cultivo::create($cultivoData);

            // Obtén los datos de costos
            $costos = $request->input('costo');

            if (!empty($costos) && is_array($costos)) {
                foreach ($costos as $costoData) {
                    $concepto = $costoData['concepto']; // Obtén el concepto para esta fila
                    // Crea una instancia de Costos con los datos de esta fila
                    $costo = new Costos([
                        'concepto' => $concepto,
                        'insumo' => $costoData['insumo'],
                        'unidad' => $costoData['unidad'],
                        'cantidad' => $costoData['cantidad'],
                        'precio' => $costoData['precio'],
                    ]);
                    // Asigna el ID del cultivo a los costos
                    $costo->cultivo_id = $cultivo->id;
                    $costo->save();
                }
            }

            return redirect()->route('ListaCultivos')->with('success', 'Cultivo y costos creados exitosamente');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
        {
            try {
                $data['nombre'] = $request['nombre'];
                $data['tipo'] = $request['tipo'];
                $data['modalidad'] = $request['modalidad'];
                $data['ciclo'] = $request['ciclo'];
                $data['rendimiento'] = $request['rendimiento'];
                $res = Cultivo::where('id', $id)->update($data);

                if ($res) {
                    return redirect()->route('ListaCultivos', ['id' => $id])->with('success', 'Cultivo actualizado correctamente');                   
                } else {
                    return redirect()->back()->with('error', 'No se pudo actualizar el cultivo');
                }
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()], 500);
            }
        }

        public function edit($id)
        {
            try {
                $cultivo = Cultivo::find($id);

                $ciclo = Cultivo::pluck('ciclo', 'id')->unique();
                if (!$cultivo) {
                    return redirect()->route('ListaCultivos')->with('error', 'El cultivo no existe');
                }
                
                return view('ActualizaCultivo', compact('cultivo'), compact('ciclo'));
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
