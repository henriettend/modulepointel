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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('statut')->default('en cours');
$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
$table->foreignId('manager_id')->constrained('users')->onDelete('cascade');
$table->foreignId('campagne_evaluations_id')->constrained('campagne_evaluations')->onDelete('cascade');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
