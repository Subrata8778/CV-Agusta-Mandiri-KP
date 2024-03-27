<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_photos', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->unsignedBigInteger("car_product_id");
            $table->timestamps();

            $table->foreign("car_product_id")->references("id")->on("car_products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_photos');
    }
}
