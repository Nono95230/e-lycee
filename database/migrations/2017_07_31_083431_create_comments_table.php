<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id'); 
            $table->string('title', 130);
            $table->text('content');
            $table->unsignedInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE');
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
