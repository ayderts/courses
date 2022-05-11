<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    private const TABLE_NAME = 'feedback';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('handbook_feedback_id')
                ->comment('Справочник: обратная связь')
                ->constrained('handbook_feedback')
                ->cascadeOnDelete();
            $table->string('name')->comment('Имя');
            $table->string('phone')->nullable()->comment('Телефон');
            $table->string('email')->nullable()->comment('Эл. адрес');
            $table->text('content')->comment('Содержание');
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
