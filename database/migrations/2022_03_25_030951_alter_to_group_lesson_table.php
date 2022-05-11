<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterToGroupLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_lesson', function (Blueprint $table) {
            $table->foreignId('coach_id')->nullable()->comment('Тренер')->constrained('coaches')->cascadeOnDelete();
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['coach_id']);
            $table->dropColumn('coach_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_lesson', function (Blueprint $table) {
            $table->dropForeign(['coach_id']);
            $table->dropColumn('coach_id');
            Schema::table('lessons', function (Blueprint $table) {
                $table->foreignId('coach_id')->nullable()->constrained('coaches')->cascadeOnDelete();
            });
        });
    }
}
