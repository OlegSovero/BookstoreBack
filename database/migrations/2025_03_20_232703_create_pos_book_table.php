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
        Schema::create('pos_book', function (Blueprint $table) {
            $table->id('id_book');
            $table->string('isbn',13);
            $table->string('name',150);
            $table->integer('stock');
            $table->decimal('precio',10,2);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_book');
    }
};
