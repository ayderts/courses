<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterToLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->bigInteger('coach_id')->nullable()->change();
            $table->dropColumn('lessonable_id');
            $table->dropColumn('lessonable_type');
            $table->foreignId('program_id')->nullable()->constrained('programs')->cascadeOnDelete();
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
            $table->integer('order')->comment('Позиция');
            $table->bigInteger('coach_id')->change();
            $table->bigInteger('lessonable_id');
            $table->string('lessonable_type');
            $table->dropForeign(['program_id']);
            $table->dropColumn('program_id');
        });
    }
}
