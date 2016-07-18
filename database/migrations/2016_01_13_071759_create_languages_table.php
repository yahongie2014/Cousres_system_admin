<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('locale', 10);
            $table->enum('dir', ['ltr', 'rtl'])->default('ltr');
            $table->string('flag')->nullable();
            // 0 => inactive, 1 => active
            $table->enum('status', [0, 1])->default(0);
            // 0 => not default, 1 => default
            $table->enum('is_default', [0, 1])->default(0);
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
        Schema::drop('languages');
    }
}
