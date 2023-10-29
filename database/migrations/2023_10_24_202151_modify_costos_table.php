<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCostosTable extends Migration
{
    public function up()
    {
        Schema::table('costos', function (Blueprint $table) {
            $table->string('concepto', 255)->change();
            $table->string('insumo', 255)->change();
            $table->string('unidad', 255)->change();
            $table->string('cantidad', 255)->change();
        });
    }

    public function down()
    {
        Schema::table('costos', function (Blueprint $table) {
            $table->string('concepto', 30)->change(); // Cambia de nuevo a 30 caracteres si necesitas revertir
            $table->string('insumo', 30)->change(); // Cambia de nuevo a 30 caracteres si necesitas revertir
            $table->string('unidad', 30)->change(); // Cambia de nuevo a 30 caracteres si necesitas revertir
            $table->string('cantidad', 30)->change(); // Cambia de nuevo a 30 caracteres si necesitas revertir
        });
    }
}