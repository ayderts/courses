<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleCoachesToCoursesTable extends Migration
{
    private const PIVOT_TABLE_NAME = 'ref_coaches_courses';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::PIVOT_TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')  // change course group model name
            ->comment('Курс')
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->foreignId('coaches_id')
                ->comment('Тренер')
                ->constrained('coaches')
                ->cascadeOnDelete();
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
        Schema::dropIfExists(self::PIVOT_TABLE_NAME);
    }
}


