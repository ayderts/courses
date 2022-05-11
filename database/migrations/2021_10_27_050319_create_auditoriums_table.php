<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriumsTable extends Migration
{
    private const TABLE_NAME = 'auditoriums';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('handbook_auditorium_id')
                ->comment('Аудитории')
                ->constrained('handbook_auditoriums')
                ->cascadeOnDelete();
            $table->foreignId('group_id')
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->foreignId('lesson_id')
                ->comment('Урок')
                ->constrained('lessons')
                ->cascadeOnDelete();
            $table->foreignId('coach_id')
                ->nullable()
                ->comment('Тренер')
                ->constrained('users')
                ->nullOnDelete();
            $table->foreignId('coordinator_id')
                ->nullable()
                ->comment('Координатор')
                ->constrained('users')
                ->nullOnDelete();
            $table->string('name')->comment('Название');
            $table->integer('student_number')->comment('Кол. слушателей');
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
