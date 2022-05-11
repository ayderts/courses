<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponsesTable extends Migration
{
    private const TABLE_NAME = 'survey_responses';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->comment('Слушатель')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('survey_id')
                ->comment('Опрос')
                ->constrained('surveys')
                ->cascadeOnDelete();
            $table->json('survey_results')->comment('Опрос');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
