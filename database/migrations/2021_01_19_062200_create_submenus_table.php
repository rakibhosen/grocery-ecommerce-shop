<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->string('submenu_name');
            $table->Integer('menu_id')->nullable();
            $table->Integer('brand_id')->nullable();
            $table->Integer('cat_id')->nullable();
            $table->Integer('subcat_id')->nullable();
            $table->string('submenu_url')->nullable();
             $table->string('submenu_image')->nullable();
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
        Schema::dropIfExists('submenus');
    }
}
