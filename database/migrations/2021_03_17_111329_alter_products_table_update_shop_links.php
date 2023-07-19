<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTableUpdateShopLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('link_shop_wf');
            $table->dropColumn('link_shop_sonepar');
            $table->dropColumn('link_shop_dysbox');
            $table->dropColumn('link_shop_electrolan');
            $table->dropColumn('link_shop_fabbri');
            $table->dropColumn('link_shop_electroplast');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->text('link_shop')->nullable()->after('code_3d');
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
