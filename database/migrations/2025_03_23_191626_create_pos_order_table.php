<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pos_order', function (Blueprint $table) {
            $table->id('id_order');
            $table->unsignedBigInteger('id_client');
            $table->decimal('total',10,2);
            $table->string('doc_number',20)->nullable();
            $table->timestamps();

            $table->foreign('id_client') // Columna en pos_order que será la llave foránea
                ->references('id_client') // Columna en pos_cliente que será referenciada
                ->on('pos_client') // Tabla a la que hace referencia
                ->onDelete('cascade'); // Acción en caso de eliminación (opcional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_order');
    }
};
