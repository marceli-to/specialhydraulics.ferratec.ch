<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTableTranslatableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('subtitle')->change();
            $table->text('description')->change();
            $table->text('diameter')->change();
            $table->text('code_youtube')->change();
            $table->text('caption_youtube')->change();
            $table->text('code_3d')->change();
            $table->text('caption_3d')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
