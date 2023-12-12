<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportes;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{
    /*public function descargarPDF($id)
    {
        $reporte = Reportes::find($id);
        
        if ($reporte) {
            // Obtén el contenido binario del PDF desde el reporte
            $pdfResource = $reporte->pdf;
            
            // Convierte el recurso binario en una cadena
            $pdfData = stream_get_contents($pdfResource);
            
            // Crea una respuesta de descarga con el contenido del PDF y los encabezados adecuados
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=nombre_del_archivo.pdf',
            ];

            return response()->stream(
                function () use ($pdfData) {
                    // Abre el flujo del recurso binario
                    $stream = fopen('php://output', 'w');
                    // Escribe el contenido binario en el flujo
                    fwrite($stream, $pdfData);
                    // Cierra el flujo
                    fclose($stream);
                },
                200,
                $headers
            );
        } else {
            return abort(404); // Si no se encuentra el reporte, devuelve un error 404.
        }
    }
*/
    public function descargarPDF($id)
    {
        $reporte = Reportes::find($id);

        if ($reporte) {
            // Verifica si el campo 'pdf' es un recurso
            if (is_resource($reporte->pdf)) {
                // Si es un recurso, utiliza el contenido directamente
                $pdfContent = base64_decode($pdfContent = stream_get_contents($reporte->pdf));
            } else {
                // Si no es un recurso, asume que es el contenido del PDF y utilízalo directamente
                
                $pdfContent = stream_get_contents($reporte->pdf);
            }

            // Configura la respuesta de descarga con el contenido del PDF y los encabezados adecuados
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=nombre_del_archivo.pdf',
            ];

            return response($pdfContent, 200, $headers);
        } else {
            return abort(404); // Si no se encuentra el reporte, devuelve un error 404.
        }
    }
/*
    public function descargarPDF($id)
    {
        $reporte = Reportes::find($id);

        if ($reporte) {
            // Verificar si $reporte->pdf es un recurso
            if (is_resource($reporte->pdf)) {
                // Leer el contenido del recurso y convertirlo en una cadena
                $pdfContent = base64_decode(stream_get_contents($reporte->pdf));
                
            } else {
                // Si ya es una cadena codificada en base64, no es necesario hacer nada
                $pdfContent = $reporte->pdf;
            }

            // Configura la respuesta HTTP para que el navegador descargue el archivo
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=nombre_del_archivo.pdf',
            ];

            return response($pdfContent, 200, $headers);
        } else {
            // Maneja el caso en que el informe no se encuentra
            return redirect()->route('SubirReportes')->with('error', 'El informe no se encuentra.');
        }
    }*/
}
