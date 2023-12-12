<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cultivo;
use App\Models\Costos;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Intervention\Image\Facades\Image;
use App\Exports\CultivoExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Carbon\Carbon;
use GuzzleHttp\Client;


class CalculadoraControlador extends Controller
{


    
    public function calculadoraDatos()
    {
        // Obtén los nombres únicos de los cultivos
        $nombresUnicos = Cultivo::pluck('nombre')->unique();
    
        return view('Calculadora', compact('nombresUnicos'));
    }
    // Función para calcular el subtotal de costos
    private function calcularSubtotal($costos)
    {
        $subtotal = 0;
        foreach ($costos as $costo) {
            $subtotal += $costo->cantidad * $costo->precio;
        }
        return $subtotal;
    }

    public function index(Request $request)
    {
        
        
            // Se obtienen los datos del formulario
            $nombre = $request->input('nombre');
            $nombresUnicos = Cultivo::pluck('nombre')->unique();
            $ciclo = $request->input('ciclo');
            $hectareas = $request->input('hectareas');
            $modalidad = $request->input('modalidad');
            $precio_tonelada = $request->input('precio_tonelada');
            $ano_proyeccion = $request->input('ano_proyeccion');
            // Checa la base de datos si hay un cultivo con los datos seleccionados
            $cultivo = Cultivo::where([
                'nombre' => $nombre,
                'ciclo' => $ciclo,
                'modalidad' => $modalidad,
            ])->first();

    
            if ($cultivo) {  
                $costos = $cultivo->costos;


                $costoTotal = 0;

                if ($ano_proyeccion && $ano_proyeccion !== "ninguno") {
                    // Si hay un año de proyección, calcula la proyección
                    $costos = $this->calcularProyeccion($cultivo, $costos, $precio_tonelada, $ano_proyeccion);
                    
                }

                $subtotalConcepto = $this->calcularSubtotal($costos);

                    // Agrega el subtotal al costo total
                $costoTotal += $subtotalConcepto;

                // Cálculos para las otras columnas
                $rendimiento = $cultivo->rendimiento; // Obtén el rendimiento desde la base de datos
                $precioVenta = $request->input('precio_tonelada');
                $ingresoBruto = $rendimiento * $precioVenta;
                $ingresoNeto = $ingresoBruto - $costoTotal;
            
                // Calcula la relación costo-beneficio, evitando la división por cero
                $relacionCostoBeneficio = ($costoTotal != 0) ? $ingresoNeto / $costoTotal : 0;
            
                // Pasa todos los datos a la vista
                return view('CalculadoraResultado', compact(
                    'nombre',
                    'nombresUnicos',
                    'ciclo',
                    'hectareas',
                    'modalidad',
                    'precio_tonelada',
                    'ano_proyeccion',
                    'cultivo',
                    'costoTotal',
                    'rendimiento',
                    'precioVenta',
                    'ingresoBruto',
                    'ingresoNeto',
                    'relacionCostoBeneficio'
                ));
                
            } else { //Si no existe, se manda el cultivo como dato nulo
                return view('CalculadoraResultado', compact(
                    'nombre',
                    'nombresUnicos',
                    'ciclo',
                    'hectareas',
                    'modalidad',
                    'precio_tonelada',
                    'ano_proyeccion',
                    'cultivo'
                ));
            }
        }

        private function calcularProyeccion($cultivo, $costos, $precio_tonelada, $ano_proyeccion)
        {
            // Calcula la tasa de inflación estimada
            $tasaInflacion = $this->calcularTasaInflacionEstimada($ano_proyeccion);

            // Calcula la cantidad de años a proyectar
            $aniosProyeccion = $ano_proyeccion - Carbon::now()->year;

            // Itera sobre los costos y aplica la proyección
            foreach ($costos as $costo) {
                 $costo->precio *= $tasaInflacion; // Aplica la tasa de inflación al precio
                 $costo->subtotal = $costo->cantidad * $costo->precio;
             }

            // Aplica la proyección a otras variables según sea necesario

            // Retorna los costos proyectados
            return $costos;
        }

        private function calcularTasaInflacionEstimada($ano_proyeccion)
        {
            // Datos del INPP para los años proporcionados: INPP
            $inpp1 = 99.696; //INPP para el 2019
            $inpp2 = 104.545; //INPP para el 2020
            $inpp3 = 111.929; //INPP para el 2021
            $inpp4 = 119.872; //INPP para el 2022
            $inpp5 = 121.780; //INPP para el 2023


            // Calcula la tasa de inflación promedio anual
            $tasaInflacion = 0;
            $TI2020 = ($inpp2 - $inpp1) / $inpp1;
            $TI2021 = ($inpp3 - $inpp2) / $inpp2;
            $TI2022 = ($inpp4 - $inpp3) / $inpp3;
            $TI2023 = ($inpp5 - $inpp4) / $inpp4;
            
            $tasaInflacion = ($TI2020 + $TI2021 + $TI2022 + $TI2023) / 4; // Promedio
            
            // Aplica la tasa de inflación a los años de proyección
            return pow(1 + $tasaInflacion, $ano_proyeccion - Carbon::now()->year);
        }

        public function pdf(Request $request)
        {
            $formato = $request->input('formato');
            $cultivoId = $request->input('cultivo_id');
            $precio_tonelada = $request->input('precio_tonelada');
            $ano_proyeccion = $request->input('ano_proyeccion');

            // Obtén el cultivo según el ID proporcionado en el formulario
            $cultivo = Cultivo::find($cultivoId);

            if (!$cultivo) {
                return response()->json(['error' => 'Cultivo no encontrado'], 404);
            }

                $costos = $cultivo->costos;


                $costoTotal = 0;

                if ($ano_proyeccion && $ano_proyeccion !== "ninguno") {
                    // Si hay un año de proyección, calcula la proyección
                    $this->calcularProyeccion($cultivo, $costos, $precio_tonelada, $ano_proyeccion);
                    
                }

                

                $subtotalConcepto = $this->calcularSubtotal($costos);

                    // Agrega el subtotal al costo total
                $costoTotal += $subtotalConcepto;

                // Cálculos para las otras columnas
                $rendimiento = $cultivo->rendimiento; // Obtén el rendimiento desde la base de datos
                $precioVenta = $request->input('precio_tonelada');
                $ingresoBruto = $rendimiento * $precioVenta;
                $ingresoNeto = $ingresoBruto - $costoTotal;
            
                // Calcula la relación costo-beneficio, evitando la división por cero
                $relacionCostoBeneficio = ($costoTotal != 0) ? $ingresoNeto / $costoTotal : 0;
               

            // Lógica para generar PDF según el formato seleccionado
            switch ($formato) {
                case 'pdf':
                    $data = [
                        'hectareas' => $request->input('hectareas'),
                        'precio_tonelada' => $request->input('hectareas'),
                        'cultivo' => $cultivo,
                        'costoTotal' => $costoTotal, // Asegúrate de incluir $costoTotal en el array
                        'rendimiento' => $rendimiento,
                        'precioVenta' => $precioVenta,
                        'ingresoBruto' => $ingresoBruto,
                        'ingresoNeto' => $ingresoNeto,
                        'relacionCostoBeneficio' => $relacionCostoBeneficio,
                        // Agrega cualquier otro dato que necesites pasar a la vista
                    ];

                    $pdf = PDF::loadView('creaPDF', $data);
                    return $pdf->stream('reporte.pdf');

                // Agrega casos para otros formatos si es necesario
                case 'word':
                    // Crear un nuevo objeto PhpWord
                    $phpWord = new PhpWord();
                
                    // Crear una sección
                    $section = $phpWord->addSection();

                    $header = $section->addHeader();

                    $headerImage = 'images/LogoINIFAP.png'; // Reemplaza con la ruta de tu imagen
                    $header->addImage(
                        $headerImage,
                        array(
                            'width' => 100,
                            'height' => 50,
                            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT, // Alinea la imagen a la derecha
                        )
                    );
                
                    // Definir estilos de texto
                    $sectionStyle = [
                        'bold' => true,
                        'size' => 16,
                        'name' => 'Arial',
                        'alignment' => 'center',
                    ];
                    $headerStyle = [
                        'bold' => true,
                        'size' => 14,
                        'name' => 'Arial',
                    ];
                    $headerStyle2 = [
                        'bold' => true,
                        'size' => 12,
                        'name' => 'Arial',
                    ];
                    $normalStyle = [
                        'size' => 12,
                        'name' => 'Arial',
                    ];
                    $boldStyle = [
                        'bold' => true,
                        'size' => 12,
                        'name' => 'Arial',
                    ];
                
                    // Agregar contenido al documento Word
                    $section->addText("Información del cultivo", $sectionStyle);
                
                    $section->addText("Nombre: " . $cultivo->nombre, $boldStyle);

                    // Puedes agregar un espacio en blanco o cualquier otro carácter para separar el atributo del valor
                    $section->addText("Tipo de cultivo: " . $cultivo->tipo, $boldStyle);

                    $section->addText("Modalidad: " . $cultivo->modalidad, $boldStyle);

                    $section->addText("Ciclo de cultivo: " . $cultivo->ciclo, $boldStyle);
                    // Obtener los conceptos únicos de los costos
                    $conceptosUnicos = $costos->pluck('concepto')->unique();
                
                    // Iterar sobre cada concepto
                    foreach ($conceptosUnicos as $conceptoUnico) {
                        // Agregar tabla con resultados de costos para cada concepto
                        $section->addText("\n" . $conceptoUnico, $headerStyle);
                        $costoTable = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);
                        $costoTable->addRow();
                        $costoTable->addCell(3000)->addText("Insumo", $headerStyle2);
                        $costoTable->addCell(3000)->addText("Unidad", $headerStyle2);
                        $costoTable->addCell(3000)->addText("Cantidad", $headerStyle2);
                        $costoTable->addCell(3000)->addText("Precio unitario", $headerStyle2);
                        $costoTable->addCell(2000)->addText("Subtotal", $headerStyle2);
                
                        // Filtrar los costos por el concepto actual
                        $costosConcepto = $costos->where('concepto', $conceptoUnico);
                
                        foreach ($costosConcepto as $costo) {
                            $costoTable->addRow();
                            $costoTable->addCell(3000)->addText($costo->insumo, $normalStyle);
                            $costoTable->addCell(3000)->addText($costo->unidad, $normalStyle);
                            $costoTable->addCell(3000)->addText($costo->cantidad, $normalStyle);
                            $precioFormateado = number_format($costo->precio, 2, ',', '.');
                            $costoTable->addCell(3000)->addText($precioFormateado, $normalStyle);
                            $subtotalFila = $costo->cantidad * $costo->precio;
                            $subtotalFilaFormateado = number_format($subtotalFila, 2, ',', '.');
                            $costoTable->addCell(2000)->addText($subtotalFilaFormateado, $normalStyle);
                        }
                    }

                    $nombreCultivo = $cultivo->nombre;
                
                    // Agregar la tabla final con costos totales
                    $section->addText("\nCostos Totales", $headerStyle2);
                    $totalTable = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Concepto", $headerStyle2);
                    $totalTable->addCell(3000)->addText("Cantidad", $headerStyle2);
                
                    // Agregar filas con los costos totales
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Costo Total", $normalStyle);
                    $totalTable->addCell(3000)->addText(number_format($costoTotal, 2, ',', '.'), $normalStyle);
                
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Rendimiento", $normalStyle);
                    $totalTable->addCell(3000)->addText(number_format($rendimiento, 2, ',', '.'), $normalStyle);
                
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Precio de Venta", $normalStyle);
                    $totalTable->addCell(3000)->addText(number_format($precioVenta, 2, ',', '.'), $normalStyle);
                
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Ingreso Bruto", $normalStyle);
                    $totalTable->addCell(3000)->addText(number_format($ingresoBruto, 2, ',', '.'), $normalStyle);
                
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Ingreso Neto", $normalStyle);
                    $totalTable->addCell(3000)->addText(number_format($ingresoNeto, 2, ',', '.'), $normalStyle);
                
                    $totalTable->addRow();
                    $totalTable->addCell(3000)->addText("Relación Costo-Beneficio", $normalStyle);
                    $totalTable->addCell(3000)->addText(number_format($relacionCostoBeneficio, 2, ',', '.'), $normalStyle);
                
                    // Guardar el documento Word en un archivo temporal
                    $filename = tempnam(sys_get_temp_dir(), 'reporte_word') . '_' . str_replace(' ', '_', $nombreCultivo) . '.docx';
                    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
                    $objWriter->save($filename);
                
                    // Descargar el archivo Word
                    return response()->download($filename, 'reporte_word.docx')->deleteFileAfterSend(true);
                 case 'excel':
                    $export = new CultivoExport($cultivo, $costoTotal, $rendimiento, $precioVenta, $ingresoBruto, $ingresoNeto, $relacionCostoBeneficio);
                    return Excel::download($export, 'reporte.xlsx');

                default:
                    // Manejo de errores si el formato no es reconocido
                    return response()->json(['error' => 'Formato no válido'], 400);
            }
        }
        

}
