<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFkLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropColumn(['group_id']);
            $table->bigInteger('lessonable_id');
            $table->string('lessonable_type');
            $table->integer('order')->comment('Номер занятия');
//            $table->foreignId('program_id')->comment('Программа')->nullable()->constrained('programs')->cascadeOnDelete();
            $table->dropColumn(['date', 'time_from', 'time_to']);
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
            $table->dropColumn(['order','lessonable_id', 'lessonable_type']);
            $table->foreignId('group_id')->constrained('course_groups')->cascadeOnDelete();
            $table->date('date');
            $table->time('time_from');
            $table->time('time_to');
        });
    }
}
