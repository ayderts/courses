<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    private const TABLE_NAME = 'tests';

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
            $table->text('description')->nullable()->comment('Описание теста');
            $table->foreignId('lesson_id')
                ->comment('Урок')
                ->constrained('lessons')
                ->cascadeOnDelete();
            $table->timestamp('test_deadline')->nullable()->comment('Дедлайн теста');
            $table->integer('questions_number')->comment('Количество вопросов');
            $table->integer('attempts_number')->comment('Количество попыток');
            $table->integer('time_amount')->comment('Количество времени');
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
