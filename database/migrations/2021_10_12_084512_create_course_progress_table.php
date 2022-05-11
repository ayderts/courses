<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fio')
                  ->comment('Пользователь (ФИО)')
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->foreignId('course_id')
                ->comment('Курс')
                ->constrained('courses')
                ->cascadeOnDelete();
            $table->foreignId('group_name')
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->float('average_score')->default(0.0)->comment('Средний балл');
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
        Schema::dropIfExists('course_progress');
    }
}
