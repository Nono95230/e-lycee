<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title', 130);
            $table->text('abstract')->nullable();
            $table->text('content')->nullable();
            $table->string('url_thumbnail', 100)->nullable();
            $table->string('slug', 120)->nullable();
            $table->enum('status', ['published', 'unpublished']);
            $table->dateTime('published_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
