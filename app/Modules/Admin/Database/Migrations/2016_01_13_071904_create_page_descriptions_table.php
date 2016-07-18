<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageDescriptionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('page_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('img')->nullable();
            $table->integer('arrange');
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(1);

            /*$table->foreign('page_id')->references('id')->on('pages')
                ->onUpdate('cascade')->onDelete('cascade');*/
            $table->timestamps();
        });

        Schema::create('page_description_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_desc_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('locale', 10);

            /*$table->foreign('desc_id')->references('id')->on('page_descriptions')
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
        Schema::drop('page_description_translations');
        Schema::drop('page_descriptions');
	}
}