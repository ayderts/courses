<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkStudentUserIdToGroupStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unique('user_id');
        });
        Schema::table('group_students', function (Blueprint $table) {
            $table->foreignId('student_user_id')->comment('Студент')->references('user_id')->on('students')->cascadeOnDelete();
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
            $table->dropForeign(['student_user_id']);
            $table->dropColumn('student_user_id');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropUnique(['user_id']);
        });
    }
}
