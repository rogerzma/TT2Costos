<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecultivo', 45);
            $table->string('nombrecientifico', 45);
            $table->string('tipocultivo', 45);
            $table->string('modalidad', 45);
            $table->string('ciclocultivo', 45);
            $table->string('potencialalto', 30);
            $table->string('potencialmedio', 30);
            $table->string('potencialbajo', 30);
            $table->binary('pdf'); // Columna para almacenar el contenido binario del PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
};
