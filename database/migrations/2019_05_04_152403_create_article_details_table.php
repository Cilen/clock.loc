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
            $table->string('name');
            $table->string('slug');
            $table->boolean('publish');
            $table->string('image');
            $table->string('preview_text');
            $table->text('detail_text');
            $table->string('language');
            $table->timestamps();
        });
        Schema::create('article-article', function(Blueprint $table){
            $table->integer('articles_id')->unsigned()->index();
            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('related_articles_id')->unsigned()->index();
            $table->foreign('related_articles_id')->references('id')->on('articles')->onDelete('cascade');
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
        Schema::dropIfExists('article-relatedArticle');
    }
}
