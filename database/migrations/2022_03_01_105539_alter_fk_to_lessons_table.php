<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFkToLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign('lessons_coach_id_foreign');
            $table->dropColumn('coach_id');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignId('coach_id')->nullable()->constrained('coaches')->cascadeOnDelete();
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
            $table->dropForeign(['coach_id']);
            $table->dropColumn('coach_id');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignId('coach_id')->nullable()->constrained('users')->cascadeOnDelete();
        });
    }
}
