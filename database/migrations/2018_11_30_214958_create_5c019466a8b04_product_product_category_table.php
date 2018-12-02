<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5c019466a8b04ProductProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('product_product_category')) {
            Schema::create('product_product_category', function (Blueprint $table) {
                $table->integer('product_id')->unsigned()->nullable();
                $table->foreign('product_id', 'fk_p_234693_234691_produc_5c019466a8c76')->references('id')->on('products')->onDelete('cascade');
                $table->integer('product_category_id')->unsigned()->nullable();
                $table->foreign('product_category_id', 'fk_p_234691_234693_produc_5c019466a8d1a')->references('id')->on('product_categories')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_category');
    }
}
