<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();
        });

        Schema::create('page_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('title');
            $table->string('meta_title');
            $table->text('meta_keyword');
            $table->text('meta_description');
            $table->string('locale', 10);

            /*$table->foreign('page_id')->references('id')->on('pages')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locale')->references('locale')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');*/
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('page_translations');
        Schema::drop('pages');
	}
}