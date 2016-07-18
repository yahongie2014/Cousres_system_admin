<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->string('duration');
            $table->string('img')->nullable();
            $table->text('video');
            $table->tinyInteger('video_stop');
            $table->text('question');
            $table->text('choice1');
            $table->text('choice2');
            $table->text('choice3');
            // 1 => choice1, 2 => choice2, 3 => choice3
            $table->enum('correct_answer', [1, 2, 3])->default(1);
            $table->integer('mark');
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();

            /*$table->foreign('course_id')->references('id')->on('courses')
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
        Schema::drop('sessions');
    }
}
