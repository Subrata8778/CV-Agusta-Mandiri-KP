<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("start");
            $table->time("end");
            $table->enum("order_status", ["Processed", "Finished", "Cancelled"])->default("Processed");
            $table->enum('product_type', ['Adv', 'Car', 'Prop']);
            $table->string('product_id');
            $table->foreignId("user_id")->constrained('users');
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
        Schema::dropIfExists('appointments');
    }
}
