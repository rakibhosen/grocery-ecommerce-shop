<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description');
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            $table->unsignedInteger('product_price');
            $table->boolean('product_stockout')->default(1);
            $table->unsignedInteger('product_offer_price')->nullable();
            $table->boolean('product_hot_deal')->default(1);
            $table->boolean('product_buy_one_get_one')->default(0);
            $table->unsignedInteger('cat_id')->unsigned();
            $table->unsignedInteger('subcat_id')->unsigned();
            $table->unsignedInteger('brand_id')->unsigned();
            $table->unsignedInteger('admin_id')->unsigned();
            $table->unsignedBigInteger('product_quantity')->nullable();
            $table->tinyInteger('product_status')->default(1);
            $table->string('product_slug')->nullable();
            $table->string('product_image')->nullable();
            $table->timestamps();
  

            // $table->foreignId('image_id')
            // ->constrained('images')
            // ->onDelete('cascade');

            // $table->foreignId('cat_id')
            // ->constrained('categories')
            // ->onDelete('cascade');

            // $table->foreignId('brand_id')
            // ->constrained('brands')
            // ->onDelete('cascade');
            // ---------------------------

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
