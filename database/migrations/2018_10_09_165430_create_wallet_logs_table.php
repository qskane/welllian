<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number',12);
            $table->unsignedInteger('from_wallet_id');
            $table->unsignedInteger('from_user_id');
            $table->unsignedInteger('to_wallet_id');
            $table->unsignedInteger('to_user_id');
            $table->unsignedInteger('coin');
            $table->unsignedSmallInteger('wallet_log_category_id');
            $table->unsignedInteger('unpaid')->default(0);
            $table->string('text');
            $table->string('remark')->default('');
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
        Schema::dropIfExists('wallet_logs');
    }
}
