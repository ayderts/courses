<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFkCoursesToLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['course_group_id']);
            $table->dropColumn('course_group_id');
            $table->foreignId('course_id')->nullable()->comment('Курс')->constrained('courses')->cascadeOnDelete();
            $table->dropColumn('time_from');
            $table->dropColumn('time_to');
            $table->dropColumn('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
            $table->foreignId('course_group_id')->nullable()->comment('Группа')->constrained('course_groups')->cascadeOnDelete();
            $table->date('date')->comment('Дата')->nullable();
            $table->date('time_from')->comment('Время начала')->nullable();
            $table->date('time_to')->comment('Время до')->nullable();
        });
    }
}
