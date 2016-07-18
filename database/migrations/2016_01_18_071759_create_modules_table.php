<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->tinyInteger('attendance');
            $table->tinyInteger('assignment');
            $table->tinyInteger('exam');
            $table->tinyInteger('pass');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();
        });

        Schema::create('student_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('module_id');
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
        Schema::drop('student_modules');
        Schema::drop('modules');
    }
}
