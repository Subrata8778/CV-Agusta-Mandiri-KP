<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_carts', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained('users');
            $table->foreignId("car_product_id")->constrained('car_products');
            $table->timestamps();
            $table->primary(['user_id', 'car_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_carts');
    }
}
