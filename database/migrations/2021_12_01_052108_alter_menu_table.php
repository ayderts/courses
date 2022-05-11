<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

class AlterMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_menu', function (Blueprint $table) {
            $table->string("slug")->nullable();
        });

        $menus = Menu::get();

        foreach ($menus as $menu) {
            $menu->slug = Str::slug($menu->title, '-');
            $menu->save();
        }

        Schema::table('main_menu', function (Blueprint $table) {
            $table->string('slug')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu', function (Blueprint $table) {
            //
        });
    }
}
