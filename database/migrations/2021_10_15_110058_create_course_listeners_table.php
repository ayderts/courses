<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseListenersTable extends Migration
{
    private const TABLE_NAME = "course_listeners";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")
                  ->comment("ФИО")
                  ->constrained("users")
                  ->cascadeOnDelete();
            $table->foreignId("course_id")
                  ->comment("Курс")
                  ->constrained("courses")
                  ->cascadeOnDelete();
            $table->string("email")->unique()->comment("Email");
            $table->boolean("status")->comment("Статус (внутренний/внешний)");
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
