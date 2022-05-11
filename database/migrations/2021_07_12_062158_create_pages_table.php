<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->string('content')->comment('Содержание');
            $table->string('image_uri')->nullable()->comment('Изображение');
            $table->jsonb('files')->nullable()->comment('Файлы');
            $table->string('seo_title')->nullable()->comment('SEO: заголовок');
            $table->string('seo_description')->nullable()->comment('SEO: описание');
            $table->string('seo_image')->nullable()->comment('SEO: изображение');
            $table->string('seo_slug')->comment('SEO: путь');
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
        Schema::dropIfExists('pages');
    }
}
