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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onDelete('cascade');

          $table->foreignId('critere_evaluation_id')->constrained('critere_evaluations')->onDelete('cascade');
        $table->foreignId('evaluation_id')->constrained('evaluations')->onDelete('cascade');

            $table->string('evaluateur');
            $table->integer('note');
            $table->text('remarque')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
