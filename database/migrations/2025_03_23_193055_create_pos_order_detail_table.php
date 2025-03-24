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
        Schema::create('pos_order_detail', function (Blueprint $table) {
            $table->id('id_order_detail');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_book');
            $table->decimal('detail_price',10,2);
            $table->integer('quantity');
            $table->timestamps();

                    // Agregar las llaves foráneas
                    $table->foreign('id_order')
                    ->references('id_order') // Referencia a la columna id de la tabla orders
                    ->on('pos_order') // Tabla orders
                    ->onDelete('cascade'); // Acción en caso de eliminación (opcional)
    
                $table->foreign('id_book')
                    ->references('id_book') // Referencia a la columna id de la tabla books
                    ->on('pos_book') // Tabla books
                    ->onDelete('cascade'); // Acción en caso de eliminación (opcional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_order_detail');
    }
};
