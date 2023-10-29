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
            $table->string('nombrecultivo',100);
            $table->string('nombrecientifico',100);
            $table->string('tipocultivo',100);
            $table->string('modalidad',100);
            $table->string('ciclocultivo',100);
            $table->string('potencialalto',45);
            $table->string('potencialmedio',45);
            $table->string('potencialbajo',45);
            $table->binary('pdf');
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
