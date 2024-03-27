<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_photos', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->unsignedBigInteger("prop_product_id");
            $table->timestamps();

            $table->foreign("prop_product_id")->references("id")->on("prop_products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prop_photos');
    }
}
