<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('exam_id');
            $table->integer('question_id');
            $table->string('essay_answer');
            $table->string('essay_file')->nullable();
            // 1 => single choice, 2 => multiple choices, 3 => essay
            $table->enum('question_type', [1, 2, 3])->default(1);
            // 0 => not answered, 1 => answered
            $table->enum('is_answered', [0, 1])->nullable();
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
        Schema::drop('exam_questions');
    }
}
