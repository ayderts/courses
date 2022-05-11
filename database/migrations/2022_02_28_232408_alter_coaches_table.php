<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->dropForeign(['coach_status']);
            $table->dropForeign(['group_name']);
            $table->dropForeign(['country_name']);
            $table->dropForeign(['city_name']);
            $table->dropForeign(['lesson_name']);
            $table->dropForeign(['name']);
            $table->dropColumn('name');
            $table->dropColumn('coach_status');
            $table->dropColumn('group_name');
            $table->dropColumn('country_name');
            $table->dropColumn('city_name');
            $table->dropColumn('lesson_name');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('direction_id')->nullable()->constrained('handbook_direction_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->bigInteger('coach_status');
            $table->foreign('coach_status')->references('id')->on('users')->cascadeOnDelete();
            $table->bigInteger('country_name');
            $table->foreign('country_name')->references('id')->on('location_countries')->cascadeOnDelete();
            $table->bigInteger('city_name');
            $table->foreign('city_name')->references('id')->on('location_cities')->cascadeOnDelete();
            $table->bigInteger('lesson_name');
            $table->foreign('lesson_name')->references('id')->on('lessons')->cascadeOnDelete();
            $table->bigInteger('name');
            $table->foreign('name')->references('id')->on('handbook_direction_types')->cascadeOnDelete();
            $table->dropForeign(['direction_id']);
            $table->dropColumn('direction_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
