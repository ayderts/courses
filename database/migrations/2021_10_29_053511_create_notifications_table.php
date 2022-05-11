<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    private const TABLE_NAME = 'notifications';

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
            $table->string('description')->comment('Описание');
            $table->foreignId('survey_id')
                ->nullable()
                ->comment('Опрос')
                ->constrained('surveys')
                ->cascadeOnDelete();
            $table->string('notification_type')->comment('Тип уведомления');  // константа
            $table->timestamp('published_at')->comment('Дата публикации');
            $table->boolean('is_read')->default(0)->comment('Статус уведомления(прочитано)');
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
