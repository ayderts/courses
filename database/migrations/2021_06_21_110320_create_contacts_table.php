<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    private const TABLE_NAME = 'contacts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_city_id')
                ->comment('Локация: город')
                ->constrained('location_cities')
                ->cascadeOnDelete();
            $table->string('address')->comment('Адрес');
            $table->jsonb('phones')->comment('Телефоны');
            $table->jsonb('schedule')->comment('Расписание');
            $table->geometry('map')->comment('Карта');
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
