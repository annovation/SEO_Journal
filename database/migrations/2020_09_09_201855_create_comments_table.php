<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name',20);
            $table->string('author_email',50);
            $table->string('comment', 1000);
            $table->unsignedBigInteger('post_id')->index();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('post_id')->references('id')->on('posts'); /**Kreiranje foreign key-a */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
