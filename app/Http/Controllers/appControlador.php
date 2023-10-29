<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use App\Models\Reportes;
use Illuminate\Http\Request;

class appControlador extends Controller
{
    public function getReportes(){
        return Reportes::all();
    }

    public function getCultivos(){
        return Cultivo::all();
    }

    public function createReporte(){
        return view('CreaReporte');
    }
}
