<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    private const TABLE_NAME = 'managers';
    private const PIVOT_TABLE_NAME = 'ref_manager_group';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('fio')->comment('ФИО');
            $table->string('occupation')->nullable()->comment('Должность');
            $table->string('role')->nullable()->comment('Роль');
            $table->string('phone')->nullable()->comment('Телефон');
            $table->string('email')->nullable()->comment('Email');
            $table->string('image_url')->nullable()->comment('Фотография');
            $table->string('group_name')->nullable()->comment('Название группы');
            $table->string('company_name')->nullable()->comment('Название организации');
            $table->integer('position')->default(0)->comment('Позиция');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create(self::PIVOT_TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_groups_id')  // change course group model name
                ->comment('Группа')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->foreignId('manager_id')
                ->comment('Менеджер')
                ->constrained('managers')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::PIVOT_TABLE_NAME);
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
