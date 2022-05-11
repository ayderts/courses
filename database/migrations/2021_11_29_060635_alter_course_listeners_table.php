<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCourseListenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_listeners', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['course_id']);
            $table->dropColumn(['student_id', 'course_id', 'email', 'status']);
        });

        Schema::table('course_listeners', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('job_position');
            $table->string('role');
            $table->string('personal_phone_number');
            $table->string('job_phone_number');
            $table->string('email');
            $table->boolean('type');
            $table->unsignedBigInteger("course_id");
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('cascade');
            $table->unsignedBigInteger("course_groups_id");
            $table->foreign('course_groups_id')
                  ->references('id')
                  ->on('course_groups')
                  ->onDelete('cascade');
            $table->string('company')->nullable();
            $table->string('division')->nullable();
            $table->string('project')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('erp_identifier')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('employee_level')->nullable();
            $table->string('job_position_level_top')->nullable();
            $table->string('job_position_family')->nullable();
            $table->integer('employee_grading')->nullable();
            $table->integer('position')->default(0)->comment('Позиция');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_listeners', function (Blueprint $table) {
            //
        });
    }
}
