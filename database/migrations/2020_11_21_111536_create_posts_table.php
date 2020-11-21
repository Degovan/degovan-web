<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->integer('category_post_id')->unsigned()->after('user_id');

            $table->foreign('category_post_id')
                  ->references('id')
                  ->on('category_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
