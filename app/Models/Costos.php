<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costos extends Model
{
    use HasFactory;

    protected $table = 'costos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';   // Clave primaria de la tabla

    protected $fillable = ['concepto', 'insumo', 'unidad', 'cantidad', 'precio', 'cultivo_id']; // Añade 'cultivo_id' como atributo fillable

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class, 'cultivo_id'); // Clave foránea en la tabla de costos
    }
}