<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworksTable extends Migration
{
    private const TABLE_NAME = 'homeworks';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->text('description')->comment('Описание');
            $table->foreignId('lesson_id')
                ->comment('Программа курса')
                ->constrained('lessons')
                ->cascadeOnDelete();
            $table->foreignId('group_id')
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->timestamp('homework_deadline')->comment('Дедлайн дом. работы');
            $table->string('file_url')->nullable()->comment('Файл');
            $table->integer('position')->default(0)->comment('Позиция');
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
