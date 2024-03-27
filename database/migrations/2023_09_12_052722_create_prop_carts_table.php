<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_carts', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained('users');
            $table->foreignId("prop_product_id")->constrained('prop_products');
            $table->timestamps();
            $table->primary(['user_id', 'prop_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prop_carts');
    }
}
