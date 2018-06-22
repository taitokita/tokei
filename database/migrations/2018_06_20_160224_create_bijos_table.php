<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBijosTable extends Migration
{
    public function up()
    {
        Schema::create('bijos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('status');
            $table->string('content');
            $table->string('master');
            $table->string('path');
            //$table->string('code');
            //$table->string('name');
            $table->string('type')->index();
            $table->integer('user_id')->unsigned()->index();
            
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bijos');
    }
}
