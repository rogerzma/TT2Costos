<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    protected $table = 'reportes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombrecultivo',
        'nombrecientifico',
        'tipocultivo',
        'modalidad',
        'ciclocultivo',
        'potencialalto',
        'potencialmedio',
        'potencialbajo',
        'pdf'
    ];

    public function subirPDF($archivoPDF)
    {
        $nombreArchivo = $archivoPDF->getClientOriginalName();

        // Almacenar el archivo en la carpeta storage/app/pdf (puedes personalizar la ruta según tus necesidades)
        $archivoPDF->storeAs('pdf', $nombreArchivo, 'local');

        // Almacenar la ruta del archivo en la base de datos
        $this->pdf = 'pdf/' . $nombreArchivo;
        $this->save();
    }
}
