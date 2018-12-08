<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('key', config('web.article.key_length'));
            $table->string('title');
            $table->string('description', 510);
            $table->text('html');
            $table->text('markdown');
            $table->text('image');
            $table->string('origin', 1024)->default('');
            $table->string('language_code', 10);
            $table->boolean('published')->default(false);
            $table->unsignedInteger('article_category_id');
            $table->timestamps();

            $table->index(['key', 'language_code']);
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
