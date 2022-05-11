<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonStudentsTable extends Migration
{
    private const TABLE_NAME = 'lesson_students';

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
            $table->foreignId('lesson_id')
                ->comment('Урок')
                ->constrained('lessons')
                ->cascadeOnDelete();
            $table->foreignId('student_id')
                ->comment('Слушатель')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('lesson_link_id')
                ->nullable()
                ->comment('Ссылка на урок')
                ->constrained('lesson_links')
                ->nullOnDelete();
            $table->integer('attendance')->default(0)->comment('Посещаемость');
            $table->integer('homework_score')->default(0)->comment('Оценка дом. работы');
            $table->integer('test_score')->default(0)->comment('Оценка теста');
            $table->integer('performance')->default(0)->comment('Успеваемость');
            $table->integer('test_attempts')->default(0)->comment('Кол. попыток теста');
            $table->json('test_answers')->nullable()->comment('Ответы теста');
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
