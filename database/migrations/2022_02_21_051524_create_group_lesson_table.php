<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_lesson', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('course_groups')->cascadeOnDelete();
            $table->foreignId('lesson_id')->constrained('lessons')->cascadeOnDelete();
            $table->date('date')->comment('Дата занятия');
            $table->time('time_from')->comment('Время начала занятия');
            $table->time('time_to')->comment('Время конца занятия');
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
        Schema::dropIfExists('group_lesson');
    }
}
