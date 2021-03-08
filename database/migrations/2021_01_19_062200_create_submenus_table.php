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
            $table->unsignedInteger('menu_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('cat_id')->nullable();
            $table->unsignedInteger('subcat_id')->nullable();
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
