<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductCategoriesTranslatableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('link_shop_sonepar')->nullable()->after('link_shop_wf');
            $table->text('link_shop_dysbox')->nullable()->after('link_shop_sonepar');
            $table->text('link_shop_electrolan')->nullable()->after('link_shop_dysbox');
            $table->text('link_shop_electroplast')->nullable()->after('link_shop_electrolan');
            $table->text('link_shop_fabbri')->nullable()->after('link_shop_electroplast');
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
