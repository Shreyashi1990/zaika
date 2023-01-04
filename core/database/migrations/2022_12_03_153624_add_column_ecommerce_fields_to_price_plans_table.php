<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('price_plans', function (Blueprint $table) {

            //product
            $table->integer('product_create_permission')->nullable();
            $table->string('product_simple_search_permission')->nullable();
            $table->string('product_advance_search_permission')->nullable();
            $table->string('product_duplication_permission')->nullable();
            $table->string('product_bulk_delete_permission')->nullable();

            //inventory
            $table->integer('inventory_product_update_permission')->nullable();
            $table->string('inventory_simple_search_permission')->nullable();
            $table->string('inventory_advance_search_permission')->nullable();

            //campaign
            $table->integer('campaign_create_permission')->nullable();
        });
    }

    public function down()
    {
        Schema::table('price_plans', function (Blueprint $table) {
            //
        });
    }
};
