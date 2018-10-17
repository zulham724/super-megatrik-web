<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('content_category_id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            
            $table->foreign('content_category_id')->references('id')->on('content_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_lists');
    }
}
