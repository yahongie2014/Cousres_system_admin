<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('post', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('parent_id');
        $table->enum('parent_type', ['module', 'course', 'session'])->default(NULL);
        $table->text('post');
        $table->text('title');
        $table->integer('user_id');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post');
    }
}