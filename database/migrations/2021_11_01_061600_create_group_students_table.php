<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupStudentsTable extends Migration
{
    private const TABLE_NAME = 'group_students';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->comment('Слушатели')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('group_id')
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->boolean('is_active')->default(0)->comment('Активность');
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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
