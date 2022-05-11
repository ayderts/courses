<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    private const TABLE_NAME = 'coaches';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('job_position');
            $table->string('role');
            $table->string('personal_phone_number')->nullable();
            $table->string('job_phone_number');
            $table->string('email');
            $table->foreignId('name')
                ->nullable()
                ->comment('Направление')
                ->constrained('handbook_direction_types')
                ->cascadeOnDelete();
            $table->string('photo')->nullable();
            $table->boolean('type')->nullable();
            $table->foreignId('coach_status')
                ->nullable()
                ->comment('Статус тренера')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->integer('salary')->nullable();
            $table->string('specialization')->nullable();
            $table->string('resume')->nullable();
            $table->string('requisites')->nullable();
            $table->string('status')->nullable(); 
            $table->foreignId('group_name')
                ->nullable()
                ->comment('Название группы')
                ->constrained('course_groups')
                ->cascadeOnDelete();
            $table->string('languages')->nullable();
            $table->unsignedBigInteger("country_name")->nullable();
            $table->foreign('country_name')
                  ->references('id')
                  ->on('location_countries')
                  ->onDelete('cascade');
            $table->unsignedBigInteger("city_name")->nullable();
            $table->foreign('city_name')
                    ->references('id')
                    ->on('location_cities')
                    ->onDelete('cascade');
            $table->integer('scoring')->nullable();
            $table->string('scoring_file')->nullable();
            $table->string('document')->nullable();
            $table->string('iin')->nullable();
            $table->jsonb('agreement_files')->nullable();
            $table->unsignedBigInteger("lesson_name")->nullable();
            $table->foreign('lesson_name')
                    ->references('id')
                    ->on('lessons')
                    ->onDelete('cascade');
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
