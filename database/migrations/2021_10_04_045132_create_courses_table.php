<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    private const TABLE_NAME = 'courses';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->integer('erp_id')->nullable()->comment('ERP ID');
            $table->string('name')->comment('Название');
            $table->text('description')->nullable()->comment('Описание');
            $table->integer('price')->nullable()->comment('Стоимость');
            $table->timestamp('date_from')->nullable()->comment('Дата начала');
            $table->timestamp('date_to')->nullable()->comment('Дата завершения');
            $table->string('image_url')->nullable()->comment('Изображение');
            $table->string('course_type')->default('online')->comment('Тип курса(формат)'); // константы
            $table->string('study_type')->default('inner')->comment('Тип обучения(тип оплаты)'); // константы

            $table->string('currency')->default('kzt')->comment('Валюта');  // константы
            $table->boolean('has_certificate')->default(0)->comment('Наличие сертификата');
            $table->integer('homework_number')->default(0)->comment('Кол. домашних заданий');
            $table->integer('test_number')->default(0)->comment('Кол. тестов');

            $table->foreignId('handbook_direction_type_id')
                ->nullable()
                ->comment('Тип направления')
                ->constrained('handbook_direction_types')
                ->nullOnDelete();
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
