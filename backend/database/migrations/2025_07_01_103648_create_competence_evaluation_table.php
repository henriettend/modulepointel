<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceEvaluationTable extends Migration
{
    public function up()
    {
        Schema::create('competence_evaluation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained()->onDelete('cascade');
            $table->foreignId('competence_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['evaluation_id', 'competence_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('competence_evaluation');
    }
}
