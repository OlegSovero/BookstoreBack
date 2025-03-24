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
        Schema::create('pos_client', function (Blueprint $table) {
            $table->id('id_client');
            $table->tinyInteger('doc_type');
            $table->string('doc_number',50);
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('phone',20)->nullable();
            $table->string('email',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_client');
    }
};
