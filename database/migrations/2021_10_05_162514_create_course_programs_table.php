<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseProgramsTable extends Migration
{
    private const TABLE_NAME = 'course_programs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->text('description')->comment('Описание');
            $table->foreignId('course_id')
                ->comment('Курс')
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->foreignId('coach_id')
                ->nullable()
                ->comment('Координатор(тренер)')
                ->constrained('users')
                ->nullOnDelete();
            $table->integer('duration')->default(0)->comment('Длительность (кол. часов)');
            $table->integer('position')->default(0)->comment('Позиция');
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
