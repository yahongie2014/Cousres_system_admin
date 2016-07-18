<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id');
            $table->string('title');
            $table->text('description');
            $table->text('learn');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('img')->nullable();
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();

            /*$table->foreign('module_id')->references('id')->on('modules')
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
        Schema::drop('courses');
    }
}
