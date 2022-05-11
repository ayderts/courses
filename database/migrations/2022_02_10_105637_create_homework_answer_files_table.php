<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkAnswerFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_answer_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('homework_answer_id');
            $table->foreign('homework_answer_id')->references('id')->on('homework_answers')->onDelete('cascade');
            $table->string('original_name');
            $table->string('file_path');
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
        Schema::dropIfExists('homework_answer_files');
    }
}
