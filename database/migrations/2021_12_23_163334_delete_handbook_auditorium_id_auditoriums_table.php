<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteHandbookAuditoriumIdAuditoriumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auditoriums', function (Blueprint $table) {
            $table->dropForeign(['handbook_auditorium_id']);
            $table->dropColumn('handbook_auditorium_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auditoriums', function (Blueprint $table) {
            //
        });
    }
}
