<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseGroupsTable extends Migration
{
    private const TABLE_NAME = 'course_groups';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string("group_name")->comment("Название группы");
            $table->foreignId("course")
                  ->comment("Курс")
                  ->constrained("courses")
                  ->cascadeOnDelete();
            $table->integer("number_of_students")->default(0)->comment("Кол-во слушателей");
            $table->boolean("active")->comment("Активность (да/нет)");
            $table->foreignId("fio")
                  ->comment("Добавить слушателей")
                  ->constrained("users")
                  ->cascadeOnDelete();
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
