<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->string('name');
            $table->string('domain');
            $table->string('promotion_url');
            $table->string('logo');
            $table->string('description');
            $table->string('key');
            $table->string('secret');
            $table->string('verification_key');
            $table->boolean('verified');
            $table->boolean('providing');
            $table->boolean('consuming');
            $table->unsignedInteger('consume_bid')->default(1);
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
        Schema::dropIfExists('league_medias');
    }
}
