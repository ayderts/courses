<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    private const TABLE_NAME = 'lessons';

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
            $table->text('lesson_description')->comment('Описание');
            $table->foreignId('course_program_id')
                ->comment('Программа курса')
                ->constrained('course_programs')
                ->cascadeOnDelete();
            $table->foreignId('prev_lesson_id')
                ->nullable()
                ->comment('Предыдущий урок')
                ->constrained('lessons')
                ->nullOnDelete();
            $table->foreignId('group_id')
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->foreignId('coach_id')
                ->comment('Тренер')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->date('date')->comment('Дата урока');
            $table->time('time_from')->comment('Время начала');
            $table->time('time_to')->comment('Время завершения');
            $table->string('video_url')->nullable()->comment('Видео');
            $table->string('lesson_format')->default('online')->comment('Формат урока');
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
