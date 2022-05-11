<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCertificatesTable extends Migration
{
    private const TABLE_NAME = 'course_certificates';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('fio') 
                  ->comment('ФИО') 
                  ->constrained('users') 
                  ->cascadeOnDelete(); 
            $table->integer('registration_number')->comment('Регистрационный номер'); 
            $table->foreignId('course_id') 
                  ->comment('Курс') 
                  ->constrained('courses') 
                  ->cascadeOnDelete(); 
            $table->timestamp('expiration_date')->comment('Действителен до'); 
            $table->boolean("published_or_not")->comment('Опубликован (да/нет)'); 
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
