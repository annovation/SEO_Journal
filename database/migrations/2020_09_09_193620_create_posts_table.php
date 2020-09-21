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
            $table->bigIncrements('id');
            $table->string('post_title',100);
            $table->string('short_description',250);
            $table->string('description',4000);
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('featured_post');
            $table->unsignedBigInteger('category_id')->index();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users'); /**Kreiranje foreign key-a */
            $table->foreign('category_id')->references('id')->on('categories'); /**Kreiranje foreign key-a */
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
