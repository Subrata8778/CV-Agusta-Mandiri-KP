<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_carts', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained('users');
            $table->foreignId("adv_product_id")->constrained('adv_products');
            $table->timestamps();
            $table->primary(['user_id', 'adv_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adv_carts');
    }
}
