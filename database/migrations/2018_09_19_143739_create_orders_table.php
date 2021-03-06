<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('technician_id')->nullable();
            $table->unsignedInteger('customer_id');
            $table->dateTime('order_start')->nullable();
            $table->dateTime('order_end')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('city_name')->nullable();
            $table->timestamps();


            $table->foreign('technician_id')->references('id')->on('users');
            $table->foreign('customer_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
