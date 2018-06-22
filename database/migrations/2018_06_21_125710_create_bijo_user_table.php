<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBijoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('bijo_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('bijo_id')->unsigned()->index();
            $table->string('type')->index();
            $table->timestamps();

            // Foreign key settings
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bijo_id')->references('id')->on('bijos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bijo_user');
    }
}
