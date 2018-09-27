<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  carousel (interval time, direction) / modal (delay)

        Schema::create('effects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['modal', 'carousel']);
            $table->unsignedInteger('delay');
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
        Schema::dropIfExists('effects');
    }
}
