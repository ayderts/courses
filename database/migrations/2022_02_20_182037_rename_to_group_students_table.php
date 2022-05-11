<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameToGroupStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_students', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropForeign(['student_user_id']);
        });
        Schema::rename('group_students', 'group_student');
        Schema::table('group_student', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('course_groups')->cascadeOnDelete();
            $table->foreign('student_user_id')->references('user_id')->on('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_students', function (Blueprint $table) {
            Schema::table('group_student', function (Blueprint $table) {
                $table->dropForeign(['group_id']);
                $table->dropForeign(['student_user_id']);
            });
            Schema::rename('group_student', 'group_students');
            Schema::table('group_students', function (Blueprint $table) {
                $table->foreign('group_id')->references('id')->on('course_groups')->cascadeOnDelete();
                $table->foreign('student_user_id')->references('user_id')->on('students')->cascadeOnDelete();
            });
        });
    }
}
