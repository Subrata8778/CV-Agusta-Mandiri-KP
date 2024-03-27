<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->year("year");
            $table->double("price");
            $table->double("kilometre");
            $table->enum("transmission", ["Manual", "Automatic", "Hybrid"]);
            $table->enum('capacity', ['1', '2', '3', '4', '5']);
            $table->enum("fuel", ["Petrol", "Diesel", "Electricity", "Hybrid"]);
            $table->longtext("description");
            $table->enum("sell_status", ["Available", "Sold"])->default("Available");
            $table->unsignedBigInteger("car_brand_id");
            $table->unsignedBigInteger("car_category_id");
            $table->timestamps();

            $table->foreign("car_brand_id")->references("id")->on("car_brands");
            $table->foreign("car_category_id")->references("id")->on("car_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_products');
    }
}
