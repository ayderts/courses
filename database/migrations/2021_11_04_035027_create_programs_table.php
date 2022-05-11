<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    private const TABLE_NAME = 'programs';

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
            $table->string('currency')->default('kzt')->comment('Валюта');  // константы
            $table->string('study_type')->default('inner')->comment('Тип обучения(тип оплаты)'); // константы
            $table->integer('duration')->nullable()->comment('Длительность');
            $table->boolean('has_certificate')->default(0)->comment('Наличие сертификата');
            $table->foreignId('location_city_id')
                ->nullable()
                ->comment('Город')
                ->constrained('location_cities')
                ->nullOnDelete();
            $table->foreignId('handbook_year_id')
                ->nullable()
                ->comment('Год')
                ->constrained('handbook_years')
                ->nullOnDelete();
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
