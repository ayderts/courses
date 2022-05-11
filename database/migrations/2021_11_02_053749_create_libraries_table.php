<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    private const TABLE_NAME = 'libraries';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название книги');
            $table->text('description')->comment('Описание книги');
            $table->integer('page_number')->comment('Кол. страниц');
            $table->string('image_url')->nullable()->comment('Изображение');
            $table->jsonb('files_url')->nullable()->comment('Файлы');
            $table->timestamp('published_at')->comment('Дата публикации');
            $table->foreignId('handbook_library_author_id')
                ->comment('Справочник: Библитека-автор')
                ->constrained('handbook_library_authors')
                ->cascadeOnDelete();
            $table->foreignId('handbook_library_category_id')
                ->comment('Справочник: Библитека-категория')
                ->constrained('handbook_library_categories')
                ->cascadeOnDelete();
            $table->foreignId('handbook_library_publisher_id')
                ->comment('Справочник: Библитека-издатель')
                ->constrained('handbook_library_publishers')
                ->cascadeOnDelete();
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
