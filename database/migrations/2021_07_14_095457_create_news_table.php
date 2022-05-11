<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->string('content')->comment('Содержание');
            $table->string('image_uri')->nullable()->comment('Изображение');
            $table->string('seo_title')->nullable()->comment('SEO: заголовок');
            $table->string('seo_description')->nullable()->comment('SEO: описание');
            $table->string('seo_image')->nullable()->comment('SEO: изображение');
            $table->string('seo_slug')->comment('SEO: путь');
            $table->integer('position')->default(0)->comment('Позиция');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ref_news_handbook_news_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('handbook_news_tag_id')
                ->comment('Справочник: тег новости')
                ->constrained('handbook_news_tags')
                ->cascadeOnDelete();
            $table->foreignId('news_id')
                ->comment('Новость')
                ->constrained('news')
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
        Schema::dropIfExists('news');
    }
}
