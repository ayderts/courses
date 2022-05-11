<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    private const TABLE_NAME = 'students';

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
            $table->string('student_type')->nullable()->comment('Тип тренера');  // study type constant
            $table->string('company_name')->nullable()->comment('Название компании');
            $table->string('division')->nullable()->comment('Дивизион');
            $table->string('project')->nullable()->comment('Проект');
            $table->string('employee_code')->nullable()->comment('Код сотрудника');
            $table->string('erp_id')->nullable()->comment('Идентификатор физического лица с ERP');
            $table->integer('employee_number')->nullable()->comment('Номер сотрудника');
            $table->string('position_family')->nullable()->comment('Семейство должности');
            $table->integer('grade')->nullable()->comment('Грейд');
            $table->foreignId('handbook_employee_type_id')
                ->nullable()
                ->comment('Тип сотрудника')
                ->constrained('handbook_employee_types')
                ->nullOnDelete();
            $table->foreignId('handbook_employee_level_id')
                ->nullable()
                ->comment('Уровень сотрудника')
                ->constrained('handbook_employee_levels')
                ->nullOnDelete();
            $table->foreignId('handbook_employee_top_level_id')
                ->nullable()
                ->comment('Топ уровень сотрудника')
                ->constrained('handbook_employee_top_levels')
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
