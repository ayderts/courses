<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHomeworkFeedback extends Migration
{
    private const TABLE_NAME = 'homework_feedback';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->integer("score")->comment("Оценка за домашнее задание");;
            $table->string("comment")->comment("Комментарий")->nullable();
            $table->string("file_url")->comment("Прикрепленный файл")->nullable();
            $table->foreignId('homework_answer_id')->constrained('homework_answers')->cascadeOnDelete();
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
