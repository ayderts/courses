<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGroupStudentsTable extends Migration
{
    private const PIVOT_TABLE_NAME = 'ref_listeners_group_students';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_students', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
        });

        Schema::create(self::PIVOT_TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_listeners_id')  
                ->comment('Слушатель')
                ->constrained('course_listeners')
                ->cascadeOnDelete();
            $table->foreignId('group_student_id')
                ->comment('Группа-слушатель')
                ->constrained('group_students')
                ->cascadeOnDelete();
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
        Schema::table('group_students', function (Blueprint $table) {
            //
        });

        Schema::dropIfExists(self::PIVOT_TABLE_NAME);
    }
}
