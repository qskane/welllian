<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_api_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('provider_media_id');
            $table->unsignedInteger('consumer_media_id');
            $table->unsignedInteger('scheme_id');
            $table->string('batch', 10);
            $table->ipAddress('ip')->default('');
            $table->string('user_agent')->default('');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_api_logs');
    }
}
