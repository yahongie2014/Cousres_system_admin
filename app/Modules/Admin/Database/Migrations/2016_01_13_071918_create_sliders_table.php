<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img')->nullable();
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(1);
            $table->integer('arrange');
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
        Schema::drop('sliders');
	}
}