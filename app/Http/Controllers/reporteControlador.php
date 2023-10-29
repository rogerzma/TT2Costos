<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReporteRequest;
use App\Http\Requests\ReporteStore;
use App\Models\Reportes;
use Illuminate\Support\Facades\DB;

class reporteControlador extends Controller
{
    public function get()
    {
        try {
            // Recupera todos los reportes
            $reportes = Reportes::all();
    
            // Separa los reportes en dos grupos: riego y temporal
            $riegoReportes = $reportes->where('riego', true);
            $temporalReportes = $reportes->where('riego', false);
    
            return view('SubirReportes', compact('reportes', 'riegoReportes', 'temporalReportes'));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function get2(){
        try {
            $reportes = Reportes::all();
            return view('pruebaReporte', compact('reportes'));
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
      }
    }

    public function create(ReporteRequest $request)
    {
        try {
            $data = $request->only([
                'nombrecultivo',
                'nombrecientifico',
                'tipocultivo',
                'modalidad',
                'ciclocultivo',
                'potencialalto',
                'potencialmedio',
                'potencialbajo',
            ]);

            // Manejar el archivo PDF que se está subiendo
            if ($request->hasFile('pdf')) {
                $pdfFile = $request->file('pdf');

                // Verificar si el archivo es válido
                if ($pdfFile->isValid()) {
                    // Leer el contenido binario del archivo
                    $pdfContents = base64_encode(file_get_contents($pdfFile->getRealPath()));

                    $data['pdf'] = $pdfContents;
                } else {
                    return redirect()->route('CreaReporte')->with('error', 'El archivo PDF no es válido.');
                }
            }

            $res = Reportes::create($data);

            return redirect()->route('SubirReportes')->with('success', 'Reporte creado exitosamente');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    
    public function update(Request $request)
    {
        $id = $request->input('id');

        try {
            $data = $request->only([
                'nombrecultivo',
                'nombrecientifico',
                'tipocultivo',
                'modalidad',
                'ciclocultivo',
                'potencialalto',
                'potencialmedio',
                'potencialbajo',
            ]);

            $reporte = Reportes::find($id);

            if (!$reporte) {
                return redirect()->route('SubirReportes')->with('error', 'El reporte no existe');
            }

            if ($request->hasFile('pdf')) {
                $pdfFile = $request->file('pdf');

                if ($pdfFile->isValid()) {
                    // Leer el contenido binario del archivo PDF
                    $pdfContents = base64_encode(file_get_contents($pdfFile->getRealPath()));

                    $data['pdf'] = $pdfContents;
                } else {
                    return redirect()->route('EditaReporte', ['id' => $id])->with('error', 'El archivo PDF no es válido.');
                }
            }

            // Solo actualiza el campo PDF si se proporcionó un nuevo archivo
            if (isset($data['pdf'])) {
                $reporte->update(['pdf' => $data['pdf']]);
            }

            // Actualiza los demás campos
            unset($data['pdf']); // Elimina el campo PDF para evitar una doble actualización
            $reporte->update($data);

            return redirect()->route('SubirReportes', ['id' => $id])->with('success', 'Reporte actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
        public function edit($id)
        {
            try {
                $reporte = Reportes::find($id);
                $tiposCultivo = Reportes::select('tipocultivo')->distinct()->get();
                $modalidades = Reportes::select('modalidad')->distinct()->get();
                $ciclosCultivo = Reportes::select('ciclocultivo')->distinct()->get();
                
                if (!$reporte) {
                    return redirect()->route('SubirReportes')->with('error', 'El reporte no existe');
                }

                return view('ActualizaReporte', compact('reporte', 'tiposCultivo', 'modalidades', 'ciclosCultivo'));
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()], 500);
            }
        }

        public function getFiltrado()
        {
            try {
                // Obtén los filtros seleccionados desde la solicitud
                $nombrecultivo = request('cultivo');
                $modalidad = request('modalidad');
                $ciclocultivo = request('ciclocultivo');
                $tipocultivo = request('tipocultivo');

                // Construye una consulta basada en los filtros seleccionados
                $query = Reportes::query();

                if (!empty($nombrecultivo)) {
                    $query->where('nombrecultivo', $nombrecultivo);
                }

                if (!empty($modalidad)) {
                    $query->where('modalidad', $modalidad);
                }

                if (!empty($ciclocultivo)) {
                    $query->where('ciclocultivo', $ciclocultivo);
                }

                if (!empty($tipocultivo)) {
                    $query->where('tipocultivo', $tipocultivo);
                }

                // Obtener todos los reportes o los reportes filtrados según los filtros seleccionados
                $reportes = $query->get();

                // Obtener valores únicos para el filtrado
                $nombrecultivosUnicos = Reportes::distinct()->pluck('nombrecultivo');
                $modalidadesUnicas = Reportes::distinct()->pluck('modalidad');
                $ciclosUnicos = Reportes::distinct()->pluck('ciclocultivo');
                $tiposUnicos = Reportes::distinct()->pluck('tipocultivo');

                        // Filtrar los reportes por cultivo de riego
                $reportesRiego = $reportes->where('modalidad', 'Riego');

                // Filtrar los reportes por cultivo de temporal
                $reportesTemporal = $reportes->where('modalidad', 'Temporal');

                return view('filtrado', compact('reportesRiego', 'reportesTemporal', 'reportes', 'nombrecultivosUnicos', 'modalidadesUnicas', 'ciclosUnicos', 'tiposUnicos'));
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()], 500);
            }
        }
    

    public function delete($id)
        {
        try {
            $reporte = Reportes::find($id);

            if ($reporte) {
                $reporte->delete();
                return redirect()->route('SubirReportes')->with('success', 'Reporte eliminado exitosamente');
            } else {
                return response()->json(["message" => "El reporte no se encontró"], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
