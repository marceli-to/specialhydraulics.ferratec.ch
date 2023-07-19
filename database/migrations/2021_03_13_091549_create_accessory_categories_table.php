<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('title_singular', 255);
            $table->text('title_listing')->nullable();
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->tinyInteger('order')->default(-1);
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
        Schema::dropIfExists('accessory_categories');
    }
}
