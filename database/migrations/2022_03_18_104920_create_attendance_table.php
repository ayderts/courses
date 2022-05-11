<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId("coach_id")->comment('Тренер')->constrained('coaches');
            $table->foreignId("student_id")->comment('Студент')->constrained('users');
            $table->foreignId('lesson_id')->comment('Урок')->constrained('lessons');
            $table->date('date')->comment('Дата занятия');
            $table->string('attendance')->comment('Посетил / Пропустил / Пропустил по уважительной причине');
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
        Schema::dropIfExists('attendance');
    }
}
