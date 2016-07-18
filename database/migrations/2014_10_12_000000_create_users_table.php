<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('university_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('fullname');
            $table->date('birth_date');
            $table->string('phone');
            $table->string('address');
            $table->string('major');
            $table->enum('academic_year', [1, 2, 3, 4]);
            $table->text('bio');
            $table->string('img')->nullable();
            // 1 => admin, 2 => instractor, 3 => student
            $table->enum('user_type', [1, 2, 3])->default(3);
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
