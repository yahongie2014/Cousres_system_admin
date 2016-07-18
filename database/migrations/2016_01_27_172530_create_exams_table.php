<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id');
            $table->string('title');
            // $table->date('start_date');
            // $table->date('end_date');
            $table->integer('duration');
            $table->integer('scq_count');
            $table->integer('mcq_count');
            $table->integer('essay_count');
            $table->integer('scq_mark');
            $table->integer('mcq_mark');
            $table->integer('essay_mark');
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
        Schema::drop('exams');
    }
}
