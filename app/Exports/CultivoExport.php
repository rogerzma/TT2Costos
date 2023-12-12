<?php

namespace App\Exports;

use App\Cultivo;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class CultivoExport implements FromCollection, WithHeadings, WithCustomStartCell, ShouldAutoSize, WithStyles
{
    private $cultivo;
    private $costoTotal;
    private $rendimiento;
    private $precioVenta;
    private $ingresoBruto;
    private $ingresoNeto;
    private $relacionCostoBeneficio;

    public function __construct($cultivo, $costoTotal, $rendimiento, $precioVenta, $ingresoBruto, $ingresoNeto, $relacionCostoBeneficio)
    {
        $this->cultivo = $cultivo;
        $this->costoTotal = $costoTotal;
        $this->rendimiento = $rendimiento;
        $this->precioVenta = $precioVenta;
        $this->ingresoBruto = $ingresoBruto;
        $this->ingresoNeto = $ingresoNeto;
        $this->relacionCostoBeneficio = $relacionCostoBeneficio;
    }

    public function collection()
    {
        $data = new Collection();

        // Agrega los datos de la tabla de cultivos
        $data->push($this->prepareCultivoData());

        $data->push(['']); //Salto de linea

        // Agrega los datos para cada tabla aquí
        if ($this->cultivo->costos->where('concepto', 'Preparación del terreno')->count() > 0) {
            $data->push($this->prepareTableData('Preparación del terreno'));
        }
        if ($this->cultivo->costos->where('concepto', 'Siembra')->count() > 0) {
            $data->push($this->prepareTableData('Siembra'));
        }
        if ($this->cultivo->costos->where('concepto', 'Fertilización')->count() > 0) {
            $data->push($this->prepareTableData('Fertilización'));
        }
        if ($this->cultivo->costos->where('concepto', 'Combate de maleza')->count() > 0) {
            $data->push($this->prepareTableData('Combate de maleza'));
        }
        if ($this->cultivo->costos->where('concepto', 'Control de plagas')->count() > 0) {
            $data->push($this->prepareTableData('Control de plagas'));
        }
        if ($this->cultivo->costos->where('concepto', 'Control de enfermedades')->count() > 0) {
            $data->push($this->prepareTableData('Control de enfermedades'));
        }
        if ($this->cultivo->costos->where('concepto', 'Control fitosanitario')->count() > 0) {
            $data->push($this->prepareTableData('Control de fitosanitario'));
        }
        if ($this->cultivo->costos->where('concepto', 'Labores culturales')->count() > 0) {
            $data->push($this->prepareTableData('Labores culturales'));
        }
        if ($this->cultivo->costos->where('concepto', 'Labores manuales')->count() > 0) {
            $data->push($this->prepareTableData('Labores culturales'));
        }
        if ($this->cultivo->costos->where('concepto', 'Riego y drenaje')->count() > 0) {
            $data->push($this->prepareTableData('Riego y drenaje'));
        }
        if ($this->cultivo->costos->where('concepto', 'Cosecha')->count() > 0) {
            $data->push($this->prepareTableData('Cosecha'));
        }
        if ($this->cultivo->costos->where('concepto', 'Flete para siembra')->count() > 0) {
            $data->push($this->prepareTableData('Flete para siembra'));
        }
        if ($this->cultivo->costos->where('concepto', 'Renta de la tierra')->count() > 0) {
            $data->push($this->prepareTableData('Renta de la tierra'));
        }
        if ($this->cultivo->costos->where('concepto', 'Costos adicionales')->count() > 0) {
            $data->push($this->prepareTableData('Costos adicionales'));
        }

        $data->push($this->prepareTotalCostsData('Costos totales'));

        return $data;
    }

    public function headings(): array
    {
        // Retorna los encabezados de las columnas en el archivo Excel
        return [];
    }

    public function startCell(): string
    {
        // Define la celda de inicio para agregar datos personalizados
        return 'A1';
    }

    private function prepareTableData($concepto): array
    {
        $tableData = [];
        $tableData[] = [$concepto]; // Agrega una fila con el concepto arriba de los encabezados


        $tableData[] = ['Insumo', 'Unidad', 'Cantidad', 'Costo unitario', 'Subtotal'];

        foreach ($this->cultivo->costos->where('concepto', $concepto) as $costo) {
            $tableData[] = [
                $costo->insumo,
                $costo->unidad,
                $costo->cantidad,
                '$' . $costo->precio,
                '$' . number_format($costo->cantidad * $costo->precio, 2),
            ];
        }


        $tableData[] = ['Total final', '', '', '', '$' . number_format($this->calculateTotal($concepto), 2)];

        $tableData[] = ['', '', '', '', ''];
        return $tableData;
    }

    private function prepareCultivoData(): array
    {
        $cultivoData = [];
    
        // Agrega el título centrado y en negritas
        $cultivoData[] = [
            'Información del cultivo',
            '', // Vacío para la segunda columna
        ];
    
        // Agrega la fila de encabezados con bordes y color verde oscuro
        $cultivoData[] = [
            'Nombre',
            'Tipo de cultivo',
            'Modalidad',
            'Ciclo de cultivo',
        ];
    
        // Agrega los datos con bordes y color verde claro
        $cultivoData[] = [
            $this->cultivo->nombre,
            $this->cultivo->tipo,
            $this->cultivo->modalidad,
            $this->cultivo->ciclo,
        ];
    
        return $cultivoData;
    }

    private function prepareTotalCostsData($concepto): array
    {
        $tableData = [];
        $tableData[] = [$concepto]; // Agrega una fila con el concepto arriba de los encabezados

        $tableData[] = ['Concepto', 'Precio'];
        $tableData[] = ['Costo total', '$' . number_format($this->costoTotal, 2)];
        $tableData[] = ['Rendimiento', number_format($this->rendimiento, 2)];
        $tableData[] = ['Precio', '$' . number_format($this->precioVenta, 2)];
        $tableData[] = ['Ingreso bruto', '$' . number_format($this->ingresoBruto, 2)];
        $tableData[] = ['Ingreso neto', '$' . number_format($this->ingresoNeto, 2)];
        $tableData[] = ['Relación costo-beneficio', number_format($this->relacionCostoBeneficio, 2)];

        return $tableData;
    }

    private function calculateTotal($concepto): float
    {
        $subtotalCultivo = 0;

        foreach ($this->cultivo->costos->where('concepto', $concepto) as $costo) {
            $subtotalCultivo += $costo->cantidad * $costo->precio;
        }

        return $subtotalCultivo;
    }

    public function styles(Worksheet $sheet)
    {
        // Inicializar un contador para rastrear la fila actual
        $currentRow = 5;

        // Definir estilos para cada tabla
        foreach ($this->cultivo->costos->groupBy('concepto') as $concepto => $costos) {
            // Calcular el rango de celdas para la tabla actual
            $startRow = $currentRow; // Comienzo de la tabla, incluye la fila de concepto
            $endRow = $startRow + count($costos) + 2; // Sumar 2 para la fila de concepto

            // Estilo para las dos primeras filas (concepto y encabezados)
            $sheet->getStyle("A$startRow:E" . ($startRow + 1))->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER, // Alinear verticalmente al centro
                ],
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'name' => 'Arial'], // Texto blanco y Arial
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '006400'], // Verde oscuro
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);

            // Estilo para las filas de datos (subsuelo, barbecho, rastra, etc.)
            for ($row = $startRow; $row <= $endRow; $row++) {
                $fillColor = ($row == $startRow || $row == $startRow + 1) ? '006400' : '00FF00';
                $fontColor = ($row == $startRow || $row == $startRow + 1) ? 'FFFFFF' : '000000';

                $sheet->getStyle("A$row:E$row")->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER, // Alinear verticalmente al centro
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => $fillColor], // Color verde oscuro o verde claro
                    ],
                    'font' => [
                        'color' => ['rgb' => $fontColor], // Texto blanco o negro
                        'name' => 'Arial', // Fuente Arial
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            }

            // Dejar un espacio no bordeado después de la tabla
            $currentRow = $endRow + 2; // 2 filas de espacio después de la tabla
        }

        // Aplicar estilos especiales para la tabla de "Costos adicionales"
        $costosAdicionalesStartRow = $currentRow;
        $costosAdicionalesEndRow = $costosAdicionalesStartRow + count($this->cultivo->costos->where('concepto', 'Costos adicionales')) + 2;

        $sheet->getStyle("A$costosAdicionalesStartRow:B$costosAdicionalesEndRow")->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER, // Alinear verticalmente al centro
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '006400'], // Verde oscuro
            ],
            'font' => [
                'color' => ['rgb' => 'FFFFFF'], // Texto blanco
                'name' => 'Arial', // Fuente Arial
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $costosAdicionalesDataRows = range($costosAdicionalesStartRow + 2, $costosAdicionalesEndRow + 5); // Filas de datos de costos adicionales

        foreach ($costosAdicionalesDataRows as $dataRow) {
            $sheet->getStyle("A$dataRow:B$dataRow")->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER, // Alinear verticalmente al centro
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '00FF00'], // Verde claro para filas de datos
                ],
                'font' => [
                    'color' => ['rgb' => '000000'], // Texto negro
                    'name' => 'Arial', // Fuente Arial
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);
        }

        return [];
    }

    

    public function registerEvents(): array
    {
        // Escuchar eventos de hoja de cálculo
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Ajustar el tamaño de la fila para el salto de línea
                $event->sheet->getDelegate()->getRowDimension(2)->setRowHeight(10);
            },
        ];
    }
}