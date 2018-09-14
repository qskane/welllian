<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price');
            $table->decimal('bonus_rate', 4);
            $table->decimal('bonus');

            $table->decimal('origin_price');
            $table->decimal('origin_bonus_rate', 4);
            $table->decimal('origin_bonus');

            $table->string('origin');
            $table->string('cover');
            $table->unsignedInteger('mall_id');
            $table->unsignedInteger('store_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
