<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductCategoriesTableChangeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('description_singular');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->string('title', 255)->after('id');
            $table->string('title_singular', 255)->after('title');
            $table->text('description')->after('title_singular')->nullable();
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
