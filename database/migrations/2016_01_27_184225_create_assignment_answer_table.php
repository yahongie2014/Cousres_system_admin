<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('assignment_id');
            $table->text('answer');
            $table->string('file');
            $table->integer('mark')->default(null)->nullable();
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
        Schema::drop('assignment_answer');
    }
}
