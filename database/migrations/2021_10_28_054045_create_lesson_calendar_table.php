<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonCalendarTable extends Migration
{
    private const TABLE_NAME = 'lesson_calendar';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->timestamp('date_from')->comment('Дата начала');
            $table->timestamp('date_to')->comment('Дата завершения');
            $table->string('course_type')->default('online')->comment('Тип (онлайн, оффлайн, смешанный)');  // константы
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
