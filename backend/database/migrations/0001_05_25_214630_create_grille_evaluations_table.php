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
        Schema::create('grille_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
         $table->foreignId('campagne_evaluations_id')->constrained('type_evaluations')->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grille_evaluations');
    }
};
