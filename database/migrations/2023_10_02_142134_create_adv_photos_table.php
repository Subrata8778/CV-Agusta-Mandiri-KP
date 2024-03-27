<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_photos', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->unsignedBigInteger("adv_product_id");
            $table->timestamps();

            $table->foreign("adv_product_id")->references("id")->on("adv_products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adv_photos');
    }
}
