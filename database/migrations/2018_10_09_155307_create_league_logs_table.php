<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueLogsTable extends Migration
{

    protected $table = 'league_logs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('produce_media_id');
            $table->unsignedInteger('consume_media_id');
            $table->string('produce_domain', 64);
            $table->string('consume_domain', 64);
            $table->string('consume_url');
            $table->unsignedInteger('consume_bid');
            $table->ipAddress('ip');
            $table->string('user_agent');
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }

}
