<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    private const TABLE_NAME = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Логин'); // должен нызваться name из-за voyager
            $table->string('fio')->nullable()->comment('ФИО');
            $table->string('email')->unique()->comment('Email');
            $table->timestamp('email_verified_at')->nullable()->comment('Дата потверждения email');
            $table->string('password')->comment('Пароль');
            $table->rememberToken()->comment('Токен');
            $table->foreignId('location_city_id')
                ->nullable()
                ->comment('Место проживания: город')
                ->constrained('location_cities')
                ->nullOnDelete();
            $table->foreignId('location_country_id')
                ->nullable()
                ->comment('Гражданство: страна')
                ->constrained('location_countries')
                ->nullOnDelete();
            $table->string('phone')->nullable()->comment('Телефон');
            $table->string('second_phone')->nullable()->comment('Второй телефон');
            $table->string('occupation')->nullable()->comment('Должность');
            $table->timestamp('birth_date')->nullable()->comment('Дата рождения');
            $table->string('gender')->nullable()->comment('Пол');
            $table->boolean('is_active_notification')->default(0)->comment('Присылать Уведомления');
            $table->string('company_name')->nullable()->comment('Название компании');
            $table->string('holding_name')->nullable()->comment('Компания сотрудника');
            $table->text('languages')->nullable()->comment('Знание языков'); // сделать М-М с таблицой языков
            $table->string('iin')->nullable()->comment('номер ИИН');
            $table->string('id_card_file')->nullable()->comment('Файл Уд. личности/Паспорта');
            $table->string('resume_file')->nullable()->comment('Файл резюме');
            $table->string('requisites_file')->nullable()->comment('Файл реквизита');
            $table->jsonb('agreement_files')->nullable()->comment('Файлы договоров');
            $table->string('coach_type')->nullable()->comment('Тип тренера');
            $table->string('coach_status')->nullable()->comment('Статус тренера');
            $table->integer('coach_fee')->nullable()->comment('Гонорар тренера');
            $table->string('scoring_file')->nullable()->comment('Файл оценивания');
            $table->integer('scoring')->nullable()->comment('Оценивание');
            $table->integer('rups')->nullable()->comment('Рупы');
            $table->string('email_private')->nullable()->comment('Личный email');
            $table->string('division')->nullable()->comment('Дивизион');
            $table->string('project')->nullable()->comment('Проект');
            $table->string('personal_type')->nullable()->comment('Тип сотрудника');
            $table->integer('person_id')->nullable()->comment('Идентификатор Физ. лица');
            $table->integer('employee_number')->nullable()->comment('Номер сотрудника');
            $table->string('employee_code')->nullable()->comment('Код сотрудника');
            $table->string('position_level')->nullable()->comment('Уровень');
            $table->string('position_level_top')->nullable()->comment('Топ уровень');
            $table->string('position_family')->nullable()->comment('Семейство должности');
            $table->integer('grade')->nullable()->comment('Грейд');
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
