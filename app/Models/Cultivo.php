<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;
    
    protected $table = 'cultivo'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';  // Clave primaria de la tabla

    protected $fillable = ['nombre', 'tipo', 'modalidad', 'ciclo', 'rendimiento'];

    public function costos()
    {
        return $this->hasMany(Costos::class, 'cultivo_id'); // La clave foránea en la tabla de costos
    }
}